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
        $dataPost = $request->only('name', 'birthday', 'phone', 'email');

        if ($user->License->number == 0) {
            return "error";
        }

        // $check = $request->user()->TraCuu()->where([
        //     'name' => $dataPost['name'],
        //     'birthdate' => $dataPost['birthday'],
        // ])->first();

        // if ($check) {
        //     return $check;
        // }

        $data = $user->TraCuu()->create([
            'code' => Str::random(60),
            'name' => $dataPost['name'],
            'birthdate' => $dataPost['birthday'],
            'data' => '',
            'email' => $dataPost['email'],
            'phone' => $dataPost['phone'],
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

        return $data;
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
            return redirect('/tai-khoan/lich-su-tra-cuu')->with('msg', "H??? th???ng ???? g???i file lu???n gi???i v??o email $ketqua->email. c???m ??n b???n ???? s??? d???ng d???ng v??? c???a Th???n S??? H???c Sala.");
        }
        else if ($request->type == "download") {
            return Storage::disk("public")->download($ketqua->path);
        }
        else {
            return response()->file(storage_path("/app/public/$ketqua->path"), ['Content-Type' => 'application/pdf'], 'inline;');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, $id)
    {
        $user = $request->user()->TraCuu()->where('code', $id)->first();
        return view("export", compact(['id', 'user']));
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
            "0 - " . $aryThanSo['thapDinhCao'][0][3] . " tu???i",
            ($aryThanSo['thapDinhCao'][0][3] + 1) . " - " . $aryThanSo['thapDinhCao'][0][4] . " tu???i",
            ($aryThanSo['thapDinhCao'][0][4] + 1) . " - " . $aryThanSo['thapDinhCao'][1][2] . " tu???i",
            ($aryThanSo['thapDinhCao'][1][2] + 1) . " - " . $aryThanSo['thapDinhCao'][2][1] . " tu???i",
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
            "giaidoan" => '0 tu???i -' . ($aryThanSo['chuKyRenLuyen'][3][1] - 1) . ' tu???i',
            "so" => $aryThanSo['chuKyRenLuyen'][0],
            "content" => $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][0]),
        ];
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = [
            "giaidoan" => $aryThanSo['chuKyRenLuyen'][3][1] . ' tu???i -' . ($aryThanSo['chuKyRenLuyen'][3][2] - 1) . ' tu???i',
            "so" => $aryThanSo['chuKyRenLuyen'][1],
            "content" => $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][1]),
        ];
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = [
            "giaidoan" => 'sau ' . $aryThanSo['chuKyRenLuyen'][3][2] . ' tu???i',
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
        $aryReturn['SUMENH_CUOCDOI'] = $this->getContents('SMCD', "1");
        $aryReturn['BINHAN_HANHPHUC'] = $this->getContents('BAHP', "11");

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
                'PH???N I: KH??M PH?? & R??N LUY???N B???N TH??N',
                1,
                '??? ph???n n??y, ch??ng t??i s??? gi??p b???n t??m ra nguy??n nh??n khi???n b???n c?? nh???ng suy ngh?? ti??u c???c, c??ng nh?? l?? do t???i sao b???n ch??a ?????t ???????c k???t qu??? nh?? b???n mong mu???n. T??? ???? ????a ra  ph????ng ph??p nu??i d?????ng n???i l???c b??n trong ????? gi??p b???n c?? m???t suy ngh?? t??ch c???c v?? ?? ch?? m???nh m???.'
            ],
            [
                'Ch??? S??? T??m H???n (L??i b??n trong)',
                2,
                $aryReturn['TAM_HON']
            ],
            [
                'Ch??? S??? Nh??n C??ch (Th??i ????? b??n ngo??i)',
                2,
                $aryReturn['NHAN_CACH']
            ],
            [
                'Ch??? S??? C??n B???ng T??m H???n & Nh??n C??ch',
                2,
                $aryReturn['CAN_BANG_TH_NC']
            ],
            [
                'Ch??? S??? Ph???n ???ng',
                2,
                $aryReturn['PHAN_UNG']
            ],
            [
                'Ch??? S??? Ng??y Sinh',
                2,
                $aryReturn['NGAY_SINH']
            ],
            [
                'Ch??? S??? C??n B???ng',
                2,
                $aryReturn['CAN_BANG']
            ],
            [
                'Ch??? S??? Khuy???t Thi???u (N??? b??i h???c)',
                2,
                isset($aryReturn['KHUYET_THIEU']) ? $aryReturn['KHUYET_THIEU'] : ''
            ],
            [
                'Ch??? S??? Th??ch Th???c',
                2,
                $aryReturn['THACH_THUC']
            ],
            [
                'Ch??? S??? L???p',
                2,
                isset($aryReturn['CHI_SO_LAP']) ? $aryReturn['CHI_SO_LAP'] : $aryReturn['CHI_SO_LAP'] =  null
            ],
            [
                'Bi???u ????? N??ng L???c & Bi???u ????? Birth Chart',
                3,
                $aryReturn['BIEU_DO']['NANG_LUC']
            ],
            [
                'Bi???u ????? T???ng H???p',
                11,
                $aryReturn['BIEU_DO']['NANG_LUC']
            ],
            [
                'PH???N II. S??? M???NH CU???C ?????I & CON ???????NG PH??T TRI???N',
                1,
                'Sau khi b???n ???? hi???u v?? r??n luy???n ???????c b???n th??n, th?? t???i ????y ch??ng t??i s??? gi??p b???n c?? t??m ra con ???????ng ng???n nh???t ??i ?????n ?????nh cao c???a s??? nghi???p, t??m ra ???????c c??ng vi???c b???n l??m t???t nh???t v?? nh???ng th??? x?? h???i c???n m?? b???n c?? th??? l??m t???t nh???t.'
            ],
            [
                'Ch??? S??? ???????ng ?????i',
                2,
                $aryReturn['DUONG_DOI']
            ],
            [
                'Ch??? S??? S??? M???nh',
                2,
                $aryReturn['SU_MENH']
            ],
            [
                'Ch??? S??? C??n B???ng ???????ng ?????i & S??? M???nh',
                2,
                $aryReturn['CAN_BANG_DD_SM']
            ],
            [
                'Ch??? S??? Tr?????ng Th??nh',
                2,
                $aryReturn['TRUONG_THANH']
            ],
            [
                'Th??p ?????nh Cao Cu???c ?????i',
                5,
                $aryReturn['BIEU_DO']['DINH_CAO']
            ],
            [
                'Lu???n gi???i th??p ?????nh cao',
                10,
                '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><p>Lu???n gi???i: </p>',
                $aryReturn['LUAN_GIAI']['DINH_CAO']
            ],
            [
                'Th??p Th??? Th??ch Cu???c ?????i',
                6,
                $aryReturn['BIEU_DO']['THACH_THUC']
            ],
            [
                'Lu???n gi???i th??p th??ch th???c',
                10,
                '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><p>Lu???n gi???i: </p>',
                $aryReturn['LUAN_GIAI']['THACH_THUC']
            ],
            [
                'Chu K??? R??n Luy???n ???????ng ?????i',
                7,
                $aryReturn['BIEU_DO']['CHU_KY_REN_LUYEN']
            ],
            [
                'Lu???n gi???i chu k??? r??n luy???n ???????ng ?????i',
                10,
                '<br /><br /><p style="margin-top: 150px;">Lu???n gi???i: </p>',
                $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN']
            ],
            [
                'Bi???u ????? N??m Th???n S???',
                8,
                $aryReturn['BIEU_DO']['NAM_THAN_SO']
            ],
            [
                'Lu???n gi???i bi???u ????? n??m th???n s???',
                10,
                'Lu???n gi???i:',
                $aryReturn['LUAN_GIAI']['NAM_THAN_SO']
            ],
            [
                'PH???N III. L???I KHUY??N CHO B???N',
                1,
                'Cu???i c??ng, ch??ng t??i s??? ????a ra nh???ng l???i khuy??n ????? gi??p b???n DUY TR?? n??ng l?????ng T??CH C???C v?? B??NH AN trong cu???c s???ng'
            ],
            [
                'L???i Khuy??n Ph??t Tri???n B???n Th??n',
                2,
                ''
            ],
            [
                'L???i Khuy??n X??y D???ng S??? Nghi???p',
                2,
                ''
            ],
            [
                'L???i Khuy??n L???a Ch???n ?????i T??c - Ng?????i ?????ng H??nh',
                2,
                ''
            ],
            [
                'L???i Khuy??n v??? S??? M???nh Cu???c ?????i - Ph???c V??? X?? H???i',
                2,
                ''
            ],
            [
                'H?????ng ?????n Cu???c ?????i B??nh An - H???nh Ph??c - Vi??n M??n',
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
        $pdf->Text(88, 55, 'Chu k??? 1');
        $pdf->Text(87, 60, '('.$chiSoRenluyen[0].'-'. ($chiSoRenluyen[1] - 1) .' tu???i)');
        $pdf->Text(87, 65, "     s??? " . $aryData[1]);
        $pdf->Text(120, 91, 'Chu k??? 2');
        $pdf->Text(118, 96, '('.$chiSoRenluyen[1].'-'. ($chiSoRenluyen[2] - 1) .' tu???i)');
        $pdf->Text(118, 101, "     s??? " . $aryData[0]);
        $pdf->Text(65, 95, 'Chu k??? 3');
        $pdf->Text(65, 100, '('.$chiSoRenluyen[2].'++ tu???i)');
        $pdf->Text(65, 105, "     s??? " . $aryData[2]);
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
        $pdf->MultiCell(0, 0, 'M???C L???C', 0, 'C', 0, 1, '', '', true, 0);
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
