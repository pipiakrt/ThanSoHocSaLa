<?php

namespace App\Http\Controllers\Admin;

use App\Services\ThanSoHoc\DefinedDataComponent;
use App\Services\ThanSoHoc\UtilsComponent;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Jobs\guiLuanGiaiPDF as Job;
use App\Services\ThanSoHoc\MYPDF;
use App\Models\ThanSo as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PDF;
use Response;


class ExportController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $dataPost = $request->only('name', 'birthday');

        if ($user->License->number == 0) {
            return redirect('/tai-khoan')->with('error', 'Số lượt tra cứu nâng cao của bạn đã hết, nâng cấp hoạc mua thêm gói để được tiếp tục tra cứu!');
        }

        // $check = $request->user()->TraCuu()->where([
        //     'name' => $dataPost['name'],
        //     'birthdate' => $dataPost['birthday'],
        // ])->first();

        // if ($check) {
        //     return view('PDF.index')->with('result', $check);
        //     return response()->download(storage_path("uploads$check->path"), 'Test File', ['Content-Type' => 'application/pdf'], 'inline');
        // }

        $data = $user->TraCuu()->create([
            'code' => Str::random(60),
            'name' => $dataPost['name'],
            'birthdate' => $dataPost['birthday'],
            'data' => '',
            'email' => $user->email,
            'phone' => $user->phone,
            'path' => '/' . $user->id . '/' . time() . '.pdf',
            'type' => 1,
        ]);
        $user->License()->decrement('number');

        Http::post("http://localhost:3000", [
            "name" => $data->name,
            "birthdate" => $data->birthdate,
            "email" => $data->email,
            "phone" => $data->phone,
            "path" => $data->path,
            "data" => $this->tinhtoan($dataPost),
        ]);
        $file = Http::get("http://localhost:5000/view");

        Storage::disk("public")->put($data->path, $file->body());

        return response()->download(storage_path("/app/public/$data->path"), $data->name, ['Content-Type' => 'application/pdf'], 'inline');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ketqualichsutracuu(Request $request, $id)
    {
        $ketqua = $request->user()->TraCuu()->where('code', $id)->first();
        if (!$ketqua) {
            return view('errors.404');
        }
        else if ($request->type == "sendmail") {
            // Job::dispatch($dulieu, $data);
            return redirect('/tai-khoan/lich-su-tra-cuu')->with('msg', "Hệ thống đã gửi file luận giải vào email $ketqua->email. cảm ơn bạn đã sử dụng dụng vụ của Thần Số Học Sala.");
        }
        else if ($request->type == "download") {
            return Storage::disk("public")->download($ketqua->path);
        }
        else {
            return response()->file(storage_path("/app/public/$ketqua->path"), ['Content-Type' => 'application/pdf'], 'inline; filename="fasd afsd f "');
        }
    }

    public function tinhtoan($dataPost) {
        // get thanso
        $dataDefineComponent = new DefinedDataComponent();
        $name = $dataPost['name'];
        $buildName = $dataDefineComponent->convertAccentedCharacters($name);
        $buildNameFile = str_replace(' ', '-', $buildName);
        $birthday = Carbon::parse($dataPost['birthday'])->format('d/m/Y');
        $dayBirth = Carbon::parse($dataPost['birthday'])->format('d');

        $utilsComponent = new UtilsComponent();
        $aryThanSo = $utilsComponent->getThanSo($name, $birthday, false);

        $aryReturn['BIEU_DO'] = [
            'NANG_LUC'  =>  $aryThanSo['bieuDoNangLuc'],
            'DINH_CAO'  =>  $aryThanSo['thapDinhCao'],
            'THACH_THUC'  =>  $aryThanSo['thapThachThuc'],
            'CHU_KY_REN_LUYEN'  =>  $aryThanSo['chuKyRenLuyen'],
            'NAM_THAN_SO'  =>  $aryThanSo['bieuDoNamThanSo']
        ];
        $aryReturn['LUAN_GIAI'] = [
            'DINH_CAO'  =>  [],
            'THACH_THUC'  =>  [],
            'CHU_KY_REN_LUYEN'  =>  [],
            'NAM_THAN_SO'  =>  []
        ];
        $giaiDoan = [
            "0 - " . $aryThanSo['thapDinhCao'][0][3] . " tuổi",
            ($aryThanSo['thapDinhCao'][0][3] + 1) . " - " . $aryThanSo['thapDinhCao'][0][4] . " tuổi",
            ($aryThanSo['thapDinhCao'][0][4] + 1) . " - " . $aryThanSo['thapDinhCao'][1][2] . " tuổi",
            ($aryThanSo['thapDinhCao'][1][2] + 1) . " - " . $aryThanSo['thapDinhCao'][2][1] . " tuổi",
        ];
        foreach ($aryThanSo['thapDinhCao'][4] as $key => $dinhCao) {
            $aryReturn['LUAN_GIAI']['DINH_CAO'][] = [
                "giaidoan" => $giaiDoan[$key],
                "so" => $dinhCao,
                "data" => $this->getContentBoSung('TDC', $dinhCao),
            ];
        }
        foreach ($aryThanSo['thapThachThuc'][4] as $key => $tThachThuc) {
            $aryReturn['LUAN_GIAI']['THACH_THUC'][] = [
                "giaidoan" => $giaiDoan[$key],
                "so" => $tThachThuc,
                "data" => $this->getContentBoSung('TTT', $tThachThuc),
            ];
        }
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = [
            "giaidoan" => '0 tuổi -' . ($aryThanSo['chuKyRenLuyen'][3][1] - 1) . ' tuổi',
            "so" => $aryThanSo['chuKyRenLuyen'][0],
            "content" => $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][0]),
        ];
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = [
            "giaidoan" => $aryThanSo['chuKyRenLuyen'][3][1] . ' tuổi -' . ($aryThanSo['chuKyRenLuyen'][3][2] - 1) . ' tuổi',
            "so" => $aryThanSo['chuKyRenLuyen'][0],
            "content" => $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][1]),
        ];
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = [
            "giaidoan" => 'sau ' . $aryThanSo['chuKyRenLuyen'][3][2] . ' tuổi',
            "so" => $aryThanSo['chuKyRenLuyen'][2],
            "content" => $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][2]),
        ];

        $flipNamThanSo = array_flip($aryThanSo['bieuDoNamThanSo']);
        $dinhNam_1 = $flipNamThanSo[date('Y')] + 1;
        $dinhNam_2 = $dinhNam_1 + 1;
        if ($dinhNam_2 > 9) {
            $dinhNam_2 = 1;
        }
        $dinhNam_3 = $dinhNam_2 + 1;
        if ($dinhNam_3 > 9) {
            $dinhNam_3 = 1;
        }
        $firstYear = $aryThanSo['bieuDoNamThanSo'][$dinhNam_1 - 1];

        $aryReturn['LUAN_GIAI']['NAM_THAN_SO'][] = [
            "nam" => $firstYear,
            "so" => $dinhNam_1,
            "custom" => $this->getContentBoSung('NTS', $dinhNam_1),
        ];
        $aryReturn['LUAN_GIAI']['NAM_THAN_SO'][] = [
            "nam" => ($firstYear + 1),
            "so" => $dinhNam_2,
            "custom" => $this->getContentBoSung('NTS', $dinhNam_2),
        ];
        $aryReturn['LUAN_GIAI']['NAM_THAN_SO'][] = [
            "nam" => ($firstYear + 2),
            "so" => $dinhNam_3,
            "custom" => $this->getContentBoSung('NTS', $dinhNam_3),
        ];
        // Tam hon
        $aryReturn['TAM_HON'] = $this->getContents('TH', $aryThanSo['tamHon']);
        // Nhan cach
        $aryReturn['NHAN_CACH'] = $this->getContents('NC', $aryThanSo['nhanCach']);
        $aryReturn['CAN_BANG_TH_NC'] = $this->getContents('CTN', $aryThanSo['canBangTamHonNhanCach']);
        $aryReturn['PHAN_UNG'] = $this->getContents('PU', $aryThanSo['phanUng']);
        $aryReturn['NGAY_SINH'] = $this->getContentBoSung('NGS', $aryThanSo['ngaySinh']);
        $aryReturn['CAN_BANG'] = $this->getContents('CB', $aryThanSo['canBang']);
        if (!empty($aryThanSo['khuyetThieu'])) {
            foreach ($aryThanSo['khuyetThieu'] as $khuyetThieu) {
                $aryReturn['KHUYET_THIEU'][] = $this->getContents('KT', $khuyetThieu);
            }
        }
        else {
            $aryReturn['KHUYET_THIEU'][] = $this->getContents('KT', 0);
        }
        if (!empty($aryThanSo['chiSoLap'])) {
            foreach ($aryThanSo['chiSoLap'] as $chiSoLap) {
                $aryReturn['CHI_SO_LAP'][] = $this->getContents('CL', $chiSoLap);
            }
        }
        else {
            $aryReturn['CHI_SO_LAP'][] = $this->getContents('CL', 0);
        }
        $aryReturn['THACH_THUC'] = [];
        if (!empty($aryThanSo['thachThuc'])) {
            foreach ($aryThanSo['thachThuc'] as $thachThuc) {
                $aryReturn['THACH_THUC'][] = $this->getContents('TT', $thachThuc);
            }
        }
        else {
            $aryReturn['THACH_THUC'][] = $this->getContents('TT', 0);
        }
        $aryReturn['DUONG_DOI'] = $this->getContentBoSung('DD', $aryThanSo['duongDoi']);
        $aryReturn['SU_MENH'] = $this->getContentBoSung('SM', $aryThanSo['suMenh']);
        $aryReturn['CAN_BANG_DD_SM'] = $this->getContents('CDS', $aryThanSo['canBangDuongDoiSuMenh']);
        $aryReturn['TRUONG_THANH'] = $this->getContents('TRT', $aryThanSo['truongThanh']);
        $aryReturn['LOI_KHUYEN'] = $this->getContentBoSung('LK', $aryThanSo['duongDoi']);
        $aryReturn['LUA_CHON_DTDH'] = $this->getContents('LCDH', $aryThanSo['suMenh']);
        $aryReturn['SUMENH_CUOCDOI'] = $this->getContents('SMCD', $aryThanSo['tamHon']);

        $aryReturn['CON_SO'] = [
            "DUONG_DOI" => $aryThanSo['duongDoi'],
            "SU_MENH" => $aryThanSo['suMenh'],
            "CAN_BANG_DD_SM" => $aryThanSo['canBangDuongDoiSuMenh'],
            "TRUONG_THANH" => $aryThanSo['truongThanh'],
            "THACH_THUC" => $aryThanSo['thachThuc'],
            "CHI_SO_LAP" => $aryThanSo['chiSoLap'],
            "KHUYET_THIEU" => $aryThanSo['khuyetThieu'],
            "CAN_BANG" => $aryThanSo['canBang'],
            "NGAY_SINH" => $aryThanSo['ngaySinh'],
            "PHAN_UNG" => $aryThanSo['phanUng'],
            "CAN_BANG_TH_NC" => $aryThanSo['canBangTamHonNhanCach'],
            "NHAN_CACH" => $aryThanSo['nhanCach'],
            "TAM_HON" => $aryThanSo['tamHon'],
        ];

        return $aryReturn;
    }

    /**
     * @param $pdf
     * @param $size
     */
    private function addFont(&$pdf, $size)
    {
        $pdf->SetFont('dejavusans', '', $size);
    }

    /**
     * @param $pdf
     */
    private function setPageBookmark(&$pdf, $aryReturn)
    {
        // set a bookmark for the current position
        $pdfLayout = $this->definePDFLayout($aryReturn);
        $isAddPage = true;
        foreach ($pdfLayout AS $key => $itemLayout) {
            $html = '';
            if ($key > 0 && $isAddPage && !in_array($itemLayout[1], [10,11])) {
                $pdf->AddPage();
            }
            if ($itemLayout[1] != 10) {

                if ($itemLayout[1] == 1) {
                    $pdf->Bookmark($itemLayout[0], 0, 0, '', 'B', array(0, 64, 128));
                } else {
                    $pdf->Bookmark($itemLayout[0], 1, 0, '', '', array(128, 0, 0));
                }
                $this->addFont($pdf, 12);
                if ($itemLayout[1] == 11) {
                    $pdf->Cell(0, 120, $itemLayout[0], 0, 1, 'L');
                } else {
                    $pdf->Cell(0, 10, $itemLayout[0], 0, 1, 'L');
                }
                $this->addFont($pdf, 9);
                // build data
                if ($itemLayout[1] > 2) {
                    switch ($itemLayout[1]) {
                        case 3:
                            // NANG_LUC
                            $this->drawBieuDoNangLuc($pdf, $itemLayout[2]);
                            break;
                        case 11:
                            // NANG_LUC
                            $this->bieuDoTongHop($pdf, $itemLayout[2]);
                            break;
                        case 5:
                            $this->drawThapDinhCao($pdf, $itemLayout[2]);
                            // DINH_CAO
                            break;
                        case 6:
                            $this->drawThapThachThuc($pdf, $itemLayout[2]);
                            // THACH_THUC
                            break;
                        case 7:
                            // CHU_KY_REN_LUYEN
                            $this->drawRenLuyen($pdf, $itemLayout[2]);
                            break;
                        case 8:
                            // NAM_THAN_SO
                            $this->drawNamThanSo($pdf, $itemLayout[2]);
                            break;
                    }
                } else {
                    if (!is_array($itemLayout[2])) {
                        $html = <<<EOD
                            $itemLayout[2]
                        EOD;
                    } else {
                        foreach ($itemLayout[2] AS $item) {
                            $html .= <<<EOD
                                <p>$item</p>
                            EOD;
                        }
                    }
                }
            } else {
                $html = <<<EOD
                    $itemLayout[2]
                EOD;
                if (!is_array($itemLayout[3])) {
                    $html .= <<<EOD
                        $itemLayout[2]
                    EOD;
                } else {
                    foreach ($itemLayout[3] AS $item) {
                        $html .= <<<EOD
                            <p>$item</p>
                        EOD;
                    }
                }
            }

            // Print text using writeHTMLCell()
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        }
    }


    /**
     * @return array
     */
    private function definePDFLayout($aryReturn)
    {
        return [
            [
                'PHẦN I: KHÁM PHÁ & RÈN LUYỆN BẢN THÂN',
                1,
                'Ở phần này, chúng tôi sẽ giúp bạn tìm ra nguyên nhân khiến bạn có những suy nghĩ tiêu cực, cũng như lý do tại sao bạn chưa đạt được kết quả như bạn mong muốn. Từ đó đưa ra  phương pháp nuôi dưỡng nội lực bên trong để giúp bạn có một suy nghĩ tích cực và ý chí mạnh mẽ.'
            ],
            [
                'Chỉ Số Tâm Hồn (Lõi bên trong)',
                2,
                $aryReturn['TAM_HON']
            ],
            [
                'Chỉ Số Nhân Cách (Thái độ bên ngoài)',
                2,
                $aryReturn['NHAN_CACH']
            ],
            [
                'Chỉ Số Cân Bằng Tâm Hồn & Nhân Cách',
                2,
                $aryReturn['CAN_BANG_TH_NC']
            ],
            [
                'Chỉ Số Phản Ứng',
                2,
                $aryReturn['PHAN_UNG']
            ],
            [
                'Chỉ Số Ngày Sinh',
                2,
                $aryReturn['NGAY_SINH']
            ],
            [
                'Chỉ Số Cân Bằng',
                2,
                $aryReturn['CAN_BANG']
            ],
            [
                'Chỉ Số Khuyết Thiếu (Nợ bài học)',
                2,
                isset($aryReturn['KHUYET_THIEU']) ? $aryReturn['KHUYET_THIEU'] : ''
            ],
            [
                'Chỉ Số Thách Thức',
                2,
                $aryReturn['THACH_THUC']
            ],
            [
                'Chỉ Số Lặp',
                2,
                isset($aryReturn['CHI_SO_LAP']) ? $aryReturn['CHI_SO_LAP'] : $aryReturn['CHI_SO_LAP'] =  null
            ],
            [
                'Biểu Đồ Năng Lực & Biểu Đồ Birth Chart',
                3,
                $aryReturn['BIEU_DO']['NANG_LUC']
            ],
            [
                'Biểu Đồ Tổng Hợp',
                11,
                $aryReturn['BIEU_DO']['NANG_LUC']
            ],
            [
                'PHẦN II. SỨ MỆNH CUỘC ĐỜI & CON ĐƯỜNG PHÁT TRIỂN',
                1,
                'Sau khi bạn đã hiểu và rèn luyện được bản thân, thì tại đây chúng tôi sẽ giúp bạn có tìm ra con đường ngắn nhất đi đến đỉnh cao của sự nghiệp, tìm ra được công việc bạn làm tốt nhất và những thứ xã hội cần mà bạn có thể làm tốt nhất.'
            ],
            [
                'Chỉ Số Đường Đời',
                2,
                $aryReturn['DUONG_DOI']
            ],
            [
                'Chỉ Số Sứ Mệnh',
                2,
                $aryReturn['SU_MENH']
            ],
            [
                'Chỉ Số Cân Bằng Đường Đời & Sứ Mệnh',
                2,
                $aryReturn['CAN_BANG_DD_SM']
            ],
            [
                'Chỉ Số Trưởng Thành',
                2,
                $aryReturn['TRUONG_THANH']
            ],
            [
                'Tháp Đỉnh Cao Cuộc Đời',
                5,
                $aryReturn['BIEU_DO']['DINH_CAO']
            ],
            [
                'Luận giải tháp đỉnh cao',
                10,
                '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><p>Luận giải: </p>',
                $aryReturn['LUAN_GIAI']['DINH_CAO']
            ],
            [
                'Tháp Thử Thách Cuộc Đời',
                6,
                $aryReturn['BIEU_DO']['THACH_THUC']
            ],
            [
                'Luận giải tháp thách thức',
                10,
                '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><p>Luận giải: </p>',
                $aryReturn['LUAN_GIAI']['THACH_THUC']
            ],
            [
                'Chu Kỳ Rèn Luyện Đường Đời',
                7,
                $aryReturn['BIEU_DO']['CHU_KY_REN_LUYEN']
            ],
            [
                'Luận giải chu kỳ rèn luyện đường đời',
                10,
                '<br /><br /><p style="margin-top: 150px;">Luận giải: </p>',
                $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN']
            ],
            [
                'Biểu Đồ Năm Thần Số',
                8,
                $aryReturn['BIEU_DO']['NAM_THAN_SO']
            ],
            [
                'Luận giải biểu đồ năm thần số',
                10,
                'Luận giải:',
                $aryReturn['LUAN_GIAI']['NAM_THAN_SO']
            ],
            [
                'PHẦN III. LỜI KHUYÊN CHO BẠN',
                1,
                'Cuối cùng, chúng tôi sẽ đưa ra những lời khuyên để giúp bạn DUY TRÌ năng lượng TÍCH CỰC và BÌNH AN trong cuộc sống'
            ],
            [
                'Lời Khuyên Phát Triển Bản Thân',
                2,
                ''
            ],
            [
                'Lời Khuyên Xây Dựng Sự Nghiệp',
                2,
                ''
            ],
            [
                'Lời Khuyên Lựa Chọn Đối Tác - Người Đồng Hành',
                2,
                ''
            ],
            [
                'Lời Khuyên về Sứ Mệnh Cuộc Đời - Phục Vụ Xã Hội',
                2,
                ''
            ],
            [
                'Hướng Đến Cuộc Đời Bình An - Hạnh Phúc - Viên Mãn',
                2,
                ''
            ]
        ];
    }


    /**
     * @param $pdf
     * @param $aryData
     */
    private function drawBieuDoNangLuc(&$pdf, $aryData)
    {
        $style1 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(200, 200, 200));
        $pdf->Line(25, 60, 90, 60, $style1);
        $pdf->Line(25, 75, 90, 75, $style1);
        $pdf->Line(44, 50, 44, 90, $style1);
        $pdf->Line(68, 50, 68, 90, $style1);
        $pdf->SetTextColor(255, 0, 0);
        $aryReturn = [];
        foreach ($aryData[0] AS $itemData) {
            if (!isset($aryReturn[$itemData])) {
                $aryReturn[$itemData] = 0;
            } else {
                $aryReturn[$itemData] += 3;
            }
            $x = $x_f = 26;
            $y_min = 52;
            switch ($itemData) {
                case 1:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 2:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 3:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
                case 4:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 5:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 6:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
                case 7:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 8:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 9:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
            }
            $pdf->Text($x, $y, $itemData);
        }
        // 20 - 60
        $style2 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(200, 200, 200));
        $pdf->Line(110, 60, 180, 60, $style2);
        $pdf->Line(110, 75, 180, 75, $style2);
        $pdf->Line(132, 50, 132, 90, $style2);
        $pdf->Line(156, 50, 156, 90, $style2);
        $pdf->SetTextColor(0, 0, 255);
        $aryReturn = [];
        foreach ($aryData[1] AS $itemData) {
            if ($itemData == 0)
                continue;
            if (!isset($aryReturn[$itemData])) {
                $aryReturn[$itemData] = 0;
            } else {
                $aryReturn[$itemData] += 3;
            }
            $x = $x_f = 115;
            $y_min = 52;
            switch ($itemData) {
                case 1:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 2:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 3:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
                case 4:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 5:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 6:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
                case 7:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 8:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 9:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
            }
            $pdf->Text($x, $y, $itemData);
            $pdf->SetTextColor(0, 0, 0, 100);
        }
    }

    /**
     * @param $pdf
     * @param $aryData
     */
    private function bieuDoTongHop(&$pdf, $aryData)
    {
        $style1 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(200, 200, 200));
        $pdf->Line(60, 160, 135, 160, $style1);
        $pdf->Line(60, 175, 135, 175, $style1);
        $pdf->Line(85, 150, 85, 190, $style1);
        $pdf->Line(110, 150, 110, 190, $style1);
        $pdf->SetTextColor(255, 0, 0);
        $aryReturn = [];
        foreach ($aryData[0] AS $itemData) {
            if (!isset($aryReturn[$itemData])) {
                $aryReturn[$itemData] = 0;
            } else {
                $aryReturn[$itemData] += 3;
            }
            $x = $x_f = 64;
            $y_min = 152;
            switch ($itemData) {
                case 1:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 2:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 3:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
                case 4:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 5:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 6:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
                case 7:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 8:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 9:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
            }
            $pdf->Text($x, $y, $itemData);
        }
        $pdf->SetTextColor(0, 0, 255);
        foreach ($aryData[1] AS $itemData) {
            if ($itemData == 0)
                continue;
            if (!isset($aryReturn[$itemData])) {
                $aryReturn[$itemData] = 0;
            } else {
                $aryReturn[$itemData] += 3;
            }
            switch ($itemData) {
                case 1:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 2:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 3:
                    $x = $x_f + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
                case 4:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 5:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 6:
                    $x = $x_f + 24 + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
                case 7:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min + 28;
                    break;
                case 8:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min + 12;
                    break;
                case 9:
                    $x = $x_f + 48 + $aryReturn[$itemData];
                    $y = $y_min;
                    break;
            }
            $pdf->Text($x, $y, $itemData);
        }
        $pdf->SetTextColor(0, 0, 0, 100);
    }

    /**
     * @param $pdf
     * @param $aryData
     */
    private function drawThapDinhCao(&$pdf, $aryData)
    {
        $style1 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));
        $pdf->Line(50, 100, 100, 50, $style1);
        $pdf->Line(100, 50, 150, 100, $style1);

        $style1 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 128, 0));

        $pdf->Line(84, 80, 100, 65, $style1);
        $pdf->Line(100, 65, 115, 80, $style1);

        $pdf->Line(65, 100, 80, 85, $style1);
        $pdf->Line(80, 85, 95, 100, $style1);

        $pdf->Line(118, 85, 105, 100, $style1);
        $pdf->Line(118, 85, 132, 100, $style1);

        $pdf->SetTextColor(0, 0, 255);
        foreach ($aryData AS $key => $itemData)
        {
            switch ($key) {
                case 0:
                    $pdf->Text(62, 100, $itemData[0]);
                    $pdf->Text(98, 100, $itemData[1]);
                    $pdf->Text(132, 100, $itemData[2]);
                    $pdf->Text(77, 86, $itemData[3]);
                    $pdf->Text(115, 86, $itemData[4]);
                    break;
                case 1:
                    $pdf->Text(78, 80, $itemData[0]);
                    $pdf->Text(116, 80, $itemData[1]);
                    $pdf->Text(97, 66, $itemData[2]);
                    break;
                case 2:
                    $pdf->Text(98, 60, $itemData[0]);
                    $pdf->Text(97, 52, $itemData[1]);
                    break;
                case 3:
                    $pdf->Text(97, 44, $itemData[0]);
                    break;
            }
        }
        $pdf->SetTextColor(0, 0, 0, 100);
    }

    /**
     * @param $pdf
     * @param $aryData
     */
    private function drawThapThachThuc(&$pdf, $aryData)
    {
        $style1 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));
        $pdf->Line(50, 100, 100, 50, $style1);
        $pdf->Line(100, 50, 150, 100, $style1);

        $style1 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 128, 0));

        $pdf->Line(84, 80, 100, 65, $style1);
        $pdf->Line(100, 65, 115, 80, $style1);

        $pdf->Line(65, 100, 80, 85, $style1);
        $pdf->Line(80, 85, 95, 100, $style1);

        $pdf->Line(118, 85, 105, 100, $style1);
        $pdf->Line(118, 85, 132, 100, $style1);

        $pdf->SetTextColor(0, 0, 255);
        foreach ($aryData AS $key => $itemData)
        {
            switch ($key) {
                case 0:
                    $pdf->Text(62, 100, $itemData[0]);
                    $pdf->Text(98, 100, $itemData[1]);
                    $pdf->Text(132, 100, $itemData[2]);
                    $pdf->Text(77, 86, $itemData[3]);
                    $pdf->Text(115, 86, $itemData[4]);
                    break;
                case 1:
                    $pdf->Text(78, 80, $itemData[0]);
                    $pdf->Text(116, 80, $itemData[1]);
                    $pdf->Text(97, 66, $itemData[2]);
                    break;
                case 2:
                    $pdf->Text(98, 60, $itemData[0]);
                    $pdf->Text(97, 52, $itemData[1]);
                    break;
                case 3:
                    $pdf->Text(97, 44, $itemData[0]);
                    break;
            }
        }
        $pdf->SetTextColor(0, 0, 0, 100);
    }

    /**
     * @param $pdf
     * @param $aryData
     */
    private function drawRenLuyen(&$pdf, $aryData)
    {
        $chiSoRenluyen = $aryData[3];
        $style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(0, 128, 0));
        $pdf->Circle(100,90,30, 0, 70, null, $style6);
        $pdf->Circle(100,90,30, 120, 190, null, $style6);
        $pdf->Circle(100,90,30, 230, 320, null, $style6);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Text(88, 55, 'Chu kỳ 1');
        $pdf->Text(87, 60, '('.$chiSoRenluyen[0].'-'. ($chiSoRenluyen[1] - 1) .' tuổi)');
        $pdf->Text(87, 65, "     số " . $aryData[1]);
        $pdf->Text(120, 91, 'Chu kỳ 2');
        $pdf->Text(118, 96, '('.$chiSoRenluyen[1].'-'. ($chiSoRenluyen[2] - 1) .' tuổi)');
        $pdf->Text(118, 101, "     số " . $aryData[0]);
        $pdf->Text(65, 95, 'Chu kỳ 3');
        $pdf->Text(65, 100, '('.$chiSoRenluyen[2].'++ tuổi)');
        $pdf->Text(65, 105, "     số " . $aryData[2]);
        $pdf->SetTextColor(0, 0, 0, 100);
    }

    /**
     * @param $pdf
     * @param $aryData
     */
    private function drawNamThanSo(&$pdf, $aryData)
    {
        $style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(0, 128, 0));
        $pdf->Curve(18, 80, 38, 40, 60, 200, 90, 90, null, $style6);
        $pdf->Curve(90, 90, 110, 50, 130, 250, 156, 70, null, $style6);
        $pdf->Curve(156, 70, 160, 60, 170, 56, 180, 60, null, $style6);

        $pdf->SetTextColor(0, 0, 255);

        $pdf->StartTransform();
        $pdf->Rotate(65);
        $pdf->Text(0, 110, '');
        $pdf->StopTransform();

        $pdf->StartTransform();
        $pdf->Rotate(65);
        $pdf->Text(150, 10, $aryData[4]);
        $pdf->StopTransform();

        $pdf->StartTransform();
        $pdf->Rotate(80);
        $pdf->Text(250, 90, '');
        $pdf->StopTransform();

        $pdf->StartTransform();
        $pdf->Rotate(80);
        $pdf->Text(190, 50, $aryData[7]);
        $pdf->StopTransform();

        $pdf->StartTransform();
        $pdf->Rotate(45);
        $pdf->Text(160, 36, $aryData[8]);
        $pdf->StopTransform();

        $pdf->Text(24, 68, 1);
        $pdf->Text(38, 80, 2);
        $pdf->Text(50, 100, 3);
        $pdf->Text(66, 124, 4);
        $pdf->Text(78, 100, 5);
        $pdf->Text(94, 78, 6);
        $pdf->Text(130, 140, 7);
        $pdf->Text(146, 76, 8);
        $pdf->Text(160, 54, 9);

        $pdf->Text(20, 74, $aryData[0]);
        $pdf->Text(64, 130, $aryData[3]);
        $pdf->Text(91, 88, $aryData[5]);
        $pdf->Text(128, 148, $aryData[6]);

        $pdf->StartTransform();
        $pdf->Rotate(-45);
        $pdf->Text(32, 215, $aryData[1]);
        $pdf->StopTransform();
        $pdf->StartTransform();
        $pdf->Rotate(-50);
        $pdf->Text(10, 260, $aryData[2]);
        $pdf->StopTransform();
        $pdf->SetTextColor(0, 0, 0, 100);
    }
    /**
     * @param $pdf
     */
    private function setTOCPage(&$pdf)
    {
        $pdf->addTOCPage();
        $this->addFont($pdf, 16);
        $pdf->MultiCell(0, 0, 'MỤC LỤC', 0, 'C', 0, 1, '', '', true, 0);
        $this->addFont($pdf, 10);
        $bookmark_templates = array();
        $bookmark_templates[0] = '<table border="0" cellpadding="0" cellspacing="0" style="background-color:#EEFAFF"><tr><td width="155mm"><span style="font-size:10pt;color:black;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-size:10pt;color:black;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
        $bookmark_templates[1] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td width="5mm">&nbsp;</td><td width="150mm"><span style="font-size:9pt;color:green;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-size:9pt;color:green;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
        $bookmark_templates[2] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td width="10mm">&nbsp;</td><td width="145mm"><span style="font-size:9pt;color:#666666;"><i>#TOC_DESCRIPTION#</i></span></td><td width="25mm"><span style="font-size:9pt;color:#666666;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
        $pdf->addHTMLTOC(4, 'INDEX', $bookmark_templates, true, 'B', array(128,0,0));
        $pdf->endTOCPage();
    }
    /**
     * @param $txt
     * @return mixed|string|string[]|null
     */
    private function convertText($txt)
    {
        $txt = preg_replace('/style[^>]*/', '', $txt);
        $txt = str_replace('<br>', '', $txt);
        $txt = str_replace('<div>', '', $txt);
        $txt = str_replace('</div>', '', $txt);
        $txt = str_replace('<p>', '', $txt);
        $txt = str_replace('</p>', '', $txt);
        $txt = str_replace('<h1>', '<span>', $txt);
        $txt = str_replace('</h1>', '</span>', $txt);
        $txt = str_replace('&nbsp;-', '<br/>-', $txt);
        $txt = str_replace('.-', '.<br/>-', $txt);
        $txt = str_replace('&nbsp;=&gt;', '<br/>=>', $txt);
        $txt = str_replace('=>', '<br/>=>', $txt);
        $txt = str_replace('<u>', '<br/><br/><u>', $txt);
        return $txt;
    }


	private function removeStyleSheet($str)
    {
        return preg_replace('/style[^>]*/', '', $str);
    }

    /**
     * @param $key
     * @param $chiSo
     * @return string
     */
    private function getContents($key, $chiSo)
    {
        $content = '';
        $data = Model::where('page_code', 'CS-' . $key . '-' . $chiSo)->first();
        if ($data) {
            $content = $data->page_content;
        }
        return $content;
    }

    /**
     * @param $key
     * @param $chiSo
     * @return string
     */
    private function getContentBoSung($key, $chiSo)
    {
        $content = [];
        $data = Model::where('page_code', 'CS-' . $key . '-' . $chiSo)->first();
        if ($data) {
            $content = [
                "custom" => $data['custom'],
                "content" => $data->page_content,
            ];
        }
        return $content;
    }
}
