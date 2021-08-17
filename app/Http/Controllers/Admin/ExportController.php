<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PDF;
use App\Services\ThanSoHoc\DefinedDataComponent;
use App\Services\ThanSoHoc\UtilsComponent;
use App\Services\ThanSoHoc\MYPDF;
use App\Models\ThanSo as Model;
use App\Jobs\guiLuanGiaiPDF as Job;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $dataPost = $request->only('name', 'birthday');

        $count = $user->Order->where('status', 1)->count();
        if ($count == 0) {
            return redirect('/tai-khoan')->with('error', 'Yêu cầu mua tối thiểu một gói sản phẩm!');
        }
        if ($user->License->number == 0) {
            return redirect('/tai-khoan')->with('error', 'Số lượt tra cứu nâng cao của bạn đã hết, nâng cấp hoạc mua thêm gói để được tiếp tục tra cứu!');
        }

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
            "<b>Giai đoạn 1: từ 0 đến " . $aryThanSo['thapDinhCao'][0][3] . " tuổi.</b>",
            "<b>Giai đoạn 2: từ " . ($aryThanSo['thapDinhCao'][0][3] + 1) . " đến " . $aryThanSo['thapDinhCao'][0][4] . " tuổi.</b>",
            "<b>Giai đoạn 3: từ " . ($aryThanSo['thapDinhCao'][0][4] + 1) . " đến " . $aryThanSo['thapDinhCao'][1][2] . " tuổi.</b>",
            "<b>Giai đoạn 4: từ " . ($aryThanSo['thapDinhCao'][1][2] + 1) . " đến " . $aryThanSo['thapDinhCao'][2][1] . " tuổi.</b>",
        ];
        foreach ($aryThanSo['thapDinhCao'][4] as $key => $dinhCao) {
            $aryReturn['LUAN_GIAI']['DINH_CAO'][] = $giaiDoan[$key] . $this->getContents('TDC', $dinhCao);
        }
        foreach ($aryThanSo['thapThachThuc'][4] as $key => $tThachThuc) {
            $aryReturn['LUAN_GIAI']['THACH_THUC'][] = $giaiDoan[$key] . $this->getContents('TTT', $tThachThuc);
        }
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = '- Chu kỳ 1: 0-' . ($aryThanSo['chuKyRenLuyen'][3][1] - 1) . ' tuổi: ' . $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][0]);
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = '- Chu kỳ 2: ' . $aryThanSo['chuKyRenLuyen'][3][1] . '-' . ($aryThanSo['chuKyRenLuyen'][3][2] - 1) . ' tuổi: ' . $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][1]);
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = '- Chu kỳ 3: ' . $aryThanSo['chuKyRenLuyen'][3][2] . '++ tuổi: ' . $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][2]);

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
        $aryReturn['LUAN_GIAI']['NAM_THAN_SO'][] = '- Năm ' . $firstYear . ': ' . $this->getContents('NTS', $dinhNam_1);
        $aryReturn['LUAN_GIAI']['NAM_THAN_SO'][] = '- Năm ' . ($firstYear + 1) . ': ' . $this->getContents('NTS', $dinhNam_2);
        $aryReturn['LUAN_GIAI']['NAM_THAN_SO'][] = '- Năm ' . ($firstYear + 2) . ': ' . $this->getContents('NTS', $dinhNam_3);
        // Tam hon
        $aryReturn['TAM_HON'] = $this->getContents('TH', $aryThanSo['tamHon']);
        // Nhan cach
        $aryReturn['NHAN_CACH'] = $this->getContents('NC', $aryThanSo['nhanCach']);
        $aryReturn['CAN_BANG_TH_NC'] = $this->getContents('CTN', $aryThanSo['canBangTamHonNhanCach']);
        $aryReturn['PHAN_UNG'] = $this->getContents('PU', $aryThanSo['phanUng']);
        $aryReturn['NGAY_SINH'] = $this->getContents('NGS', $aryThanSo['ngaySinh']);
        $aryReturn['CAN_BANG'] = $this->getContents('CB', $aryThanSo['canBang']);
        if (!empty($aryThanSo['khuyetThieu'])) {
            foreach ($aryThanSo['khuyetThieu'] as $khuyetThieu) {
                $aryReturn['KHUYET_THIEU'][] = $this->getContents('KT', $khuyetThieu);
            }
        }
        if (!empty($aryThanSo['chiSoLap'])) {
            foreach ($aryThanSo['chiSoLap'] as $chiSoLap) {
                $aryReturn['CHI_SO_LAP'][] = $this->getContents('CL', $chiSoLap);
            }
        }
        $aryReturn['THACH_THUC'] = [];
        if (!empty($aryThanSo['thachThuc'])) {
            foreach ($aryThanSo['thachThuc'] as $thachThuc) {
                $aryReturn['THACH_THUC'][] = $this->getContents('TT', $thachThuc);
            }
        }
        $aryReturn['DUONG_DOI'] = $this->getContents('DD', $aryThanSo['duongDoi']);
        $aryReturn['SU_MENH'] = $this->getContents('SM', $aryThanSo['suMenh']);
        $aryReturn['CAN_BANG_DD_SM'] = $this->getContents('CDS', $aryThanSo['canBangDuongDoiSuMenh']);
        $aryReturn['TRUONG_THANH'] = $this->getContents('TRT', $aryThanSo['truongThanh']);

        $user->TraCuu()->create([
            'code' => Str::random(60),
            'name' => $dataPost['name'],
            'birthdate' => $dataPost['birthday'],
            'data' => $aryReturn,
            'email' => $user->email,
            'phone' => $user->phone,
            'type' => 1,
        ]);
        $user->License()->decrement('number');

        // end
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $this->addFont($pdf, 12);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('thansohocsala.com');
        $pdf->SetTitle($buildName . ' - Giải mã chuyên sâu');
        $pdf->SetSubject($buildName . ' - Giải mã chuyên sâu');

        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
        $this->addFont($pdf, 13);
        $pdf->setCellHeightRatio(2);
        $pdf->AddPage();
        $this->addFont($pdf, 9);
        $html = <<<EOD
            <h2 style="text-align: center;">THƯ NGỎ</h2>
        EOD;
                $html .= <<<EOD
                    <p>Bạn Thân Mến!<br/> <br/>
                        Bạn đang cầm trên tay “Cuốn Sách Cuộc Đời” của riêng bạn. Trước khi khám phá bản thân, hãy chắc rằng bạn đã nắm vững những thông tin cơ bản dưới đây:<br/> <br/>
                        Thứ nhất, bài báo cáo Thần Số Học được chia làm 3 phần với 19 chỉ số, các chỉ số đại diện cho: Tính cách, Năng lực cùng những Ưu điểm và Hạn chế bên trong con người bạn. Từ đó, bạn có thể hình dung được “bức tranh” cuộc đời mình một cách toàn diện, để định hướng và phát huy năng lực vượt trội của chính bản thân mình.<br/> <br/>
                        Thứ hai, Thần Số Học là một bộ môn khoa học, không phải là duy tâm và chúng không dự đoán được tương lai. Thần Số Học chỉ cho bạn thấy tiềm năng có trong con người bạn để phát huy, còn việc có phát huy được nó hay không phụ thuộc vào sự nỗ lực và rèn luyện của chính bạn. Thần Số Học cung cấp cho bạn một cái nhìn tổng quan, tuy nhiên còn phụ thuộc vào nhiều yếu tố: ý chí, sự lựa chọn hay các yếu tố môi trường nằm ngoài tầm kiểm soát của bạn.<br/><br/>
                        Thứ ba, bạn hoàn hảo theo cách của mình nên không cần so sánh các chỉ số của mình với người khác, mỗi người có một ưu điểm vượt trội riêng và bạn cũng thế. Tích cực hay tiêu cực là do sự nhận thức và cân bằng liên tục của bạn trong đời sống. Chuyên gia của Sala Group sẽ giúp bạn thấy rõ những chuyển đổi thú vị đó.<br/> <br/>
                        Cuối cùng, xin hãy nhớ rằng Sức mạnh và Tiềm năng của bạn tuyệt vời hơn bạn nghĩ rất nhiều. Hành trình khám phá và phát triển bản thân chính là đích đến và lẽ sống của mỗi người.<br/> <br/>
                        Chúc cho tất cả chúng ta đều có một cuộc sống Hạnh Phúc và Bình An!.<br/> <br/>
                        Thân ái!
                    </p>
        EOD;
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                $pdf->AddPage();
                $html = <<<EOD
                    <h2 style="text-align: center;">Đôi nét về lịch sử Thần Số Học</h2>
        EOD;
                $html .= <<<EOD
                    <p>
                        Thần Số Học (Numerology) là một hệ thống cổ xưa đã được sử dụng hàng ngàn năm, trải dài trên toàn cầu. Các ghi chép số học đã được tìm thấy ở Babylon và Ai Cập, và có bằng chứng sự tồn tại của nó cách đây hàng nghìn năm ở Hy Lạp, La Mã, Nhật Bản và Trung Quốc.<br/> <br/>
                        Người Chaldean hay được gọi là người Babylon đã nghiên cứu sâu về cả chiêm tinh học, số học và thực sự là những người đầu tiên xác định mối tương quan giữa các con số với dao động của vũ trụ nên còn được gọi là Chaldean Numerology. Qua nhiều thời đại, số học đã phát triển và được biết đến với tên tuổi của Pythagoras.<br/> <br/>
                        Ông là một triết gia, nhà toán học người Hy Lạp sống trong thời đại 590 trước công nguyên đã biết đến Chaldean và xây dựng trên nó, bổ xung các triết lý và toán học của riêng mình do đó hình thành hệ số Pythagoras. Theo thuyết học Pythagoras, mọi con số, bất kể lớn hay nhỏ luôn có thể rút gọn được thành 1 chữ số từ 1 đến 9, và mỗi chữ số rút gọn đó mang rung động vũ trụ riêng.<br/><br/>
                        Vào đầu những năm 1900, tiến sĩ Julian Stenton đã ghi lại các yếu tố khác nhau của số học và phổ biến nó, đặt ra thuật ngữ "Numerology". Từ những năm 1970 số học đã được mọi người ở mọi tầng lớp xã hội sử dụng như một công cụ tự trợ giúp được cá nhân hóa. "Các con số không nói dối" là một tuyên bố sâu sắc của các nhà nghiên cứu, khẳng định con số biểu lộ tính cách và các sự kiện mà con người trải qua với độ chính xác đáng kinh ngạc.<br/> <br/>
                        Ngày nay, Numerology được thực hành trên khắp thế giới và được hàng triệu người sử dụng để giúp cho cuộc sống trở nên tốt đẹp hơn.
                    </p>
        EOD;
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                $pdf->AddPage();
                $html = <<<EOD
                    <h2 style="text-align: center;">Học viện cổ hoc Sala</h2>
        EOD;
                $html .= <<<EOD
                    <p>
                        Dựa trên ý nghĩa cao đẹp của Sala - loài hoa linh thiêng biểu tượng của Phật giáo. HỌC VIỆN CỔ HỌC SALA mang trong mình sứ mệnh tạo niềm vui, sự an lạc và thịnh vượng. Chúng tôi mong muốn mang ứng dụng tinh hoa của cổ học vào cuộc sống một cách đơn giản và hiệu quả nhất.<br/> <br/>
                        HỌC VIỆN CỔ HỌC SALA tự hào là cầu nối đưa Thần Số Học đến gần hơn với mỗi cá nhân, mỗi gia đình và mỗi doanh nghiệp. Tại đây chúng tôi cung cấp các kiến thức giúp hỗ trợ phát triển toàn diện bản thân cho từng cá nhân, gia đình hay doanh nghiệp có thể hiểu và ứng dụng được Thần Số Học trong việc xây dựng bản đồ kế hoạch cuộc đời, có định hướng tương lai rõ ràng để gặt hái thành công toàn diện.<br/> <br/>
                        Với Đội ngũ chuyên gia tư vấn chuyên nghiệp, nhiệt tình với nhiều năng kinh nghiệm trong việc tham vấn và ứng dụng Thần Số Học vào đời sống. HỌC VIỆN CỔ HỌC SALA mong muốn lan tỏa giá trị của Thần Số Học đến với cộng đồng từ đó xây dựng một Việt Nam Thịnh Vượng và Phát Triển.<br/> <br/>
                    </p>
        EOD;
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                $pdf->AddPage();
                // set bookmark
                $this->setPageBookmark($pdf, $aryReturn);
                $this->setTOCPage($pdf);
                // build data
                $html = <<<EOD
        EOD;

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output("Giai-ma-cuoc-doi-$buildNameFile.pdf", 'I');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ketqualichsutracuu(Request $request, $id)
    {
        $dulieu = $request->user()->TraCuu()->where('code', $id)->first();
        if (!$dulieu) {
            return view('errors.404');
        }
        $aryReturn = $dulieu->data;
        $user = [
            'name' => $dulieu->name,
            'birthdate' => $dulieu->birthdate,
        ];
        $dataDefineComponent = new DefinedDataComponent();
        $name = $dulieu['name'];
        $buildName = $dataDefineComponent->convertAccentedCharacters($name);
        $buildNameFile = str_replace(' ', '-', $buildName);

        // end
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $this->addFont($pdf, 12);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('thansohocsala.com');
        $pdf->SetTitle($buildName . ' - Giải mã chuyên sâu');
        $pdf->SetSubject($buildName . ' - Giải mã chuyên sâu');

        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
        $this->addFont($pdf, 13);
        $pdf->setCellHeightRatio(2);
        $pdf->AddPage();
        $this->addFont($pdf, 9);
        $html = <<<EOD
            <h2 style="text-align: center;">THƯ NGỎ</h2>
        EOD;
                $html .= <<<EOD
                    <p>Bạn Thân Mến!<br/> <br/>
                        Bạn đang cầm trên tay “Cuốn Sách Cuộc Đời” của riêng bạn. Trước khi khám phá bản thân, hãy chắc rằng bạn đã nắm vững những thông tin cơ bản dưới đây:<br/> <br/>
                        Thứ nhất, bài báo cáo Thần Số Học được chia làm 3 phần với 19 chỉ số, các chỉ số đại diện cho: Tính cách, Năng lực cùng những Ưu điểm và Hạn chế bên trong con người bạn. Từ đó, bạn có thể hình dung được “bức tranh” cuộc đời mình một cách toàn diện, để định hướng và phát huy năng lực vượt trội của chính bản thân mình.<br/> <br/>
                        Thứ hai, Thần Số Học là một bộ môn khoa học, không phải là duy tâm và chúng không dự đoán được tương lai. Thần Số Học chỉ cho bạn thấy tiềm năng có trong con người bạn để phát huy, còn việc có phát huy được nó hay không phụ thuộc vào sự nỗ lực và rèn luyện của chính bạn. Thần Số Học cung cấp cho bạn một cái nhìn tổng quan, tuy nhiên còn phụ thuộc vào nhiều yếu tố: ý chí, sự lựa chọn hay các yếu tố môi trường nằm ngoài tầm kiểm soát của bạn.<br/><br/>
                        Thứ ba, bạn hoàn hảo theo cách của mình nên không cần so sánh các chỉ số của mình với người khác, mỗi người có một ưu điểm vượt trội riêng và bạn cũng thế. Tích cực hay tiêu cực là do sự nhận thức và cân bằng liên tục của bạn trong đời sống. Chuyên gia của Sala Group sẽ giúp bạn thấy rõ những chuyển đổi thú vị đó.<br/> <br/>
                        Cuối cùng, xin hãy nhớ rằng Sức mạnh và Tiềm năng của bạn tuyệt vời hơn bạn nghĩ rất nhiều. Hành trình khám phá và phát triển bản thân chính là đích đến và lẽ sống của mỗi người.<br/> <br/>
                        Chúc cho tất cả chúng ta đều có một cuộc sống Hạnh Phúc và Bình An!.<br/> <br/>
                        Thân ái!
                    </p>
        EOD;
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                $pdf->AddPage();
                $html = <<<EOD
                    <h2 style="text-align: center;">Đôi nét về lịch sử Thần Số Học</h2>
        EOD;
                $html .= <<<EOD
                    <p>
                        Thần Số Học (Numerology) là một hệ thống cổ xưa đã được sử dụng hàng ngàn năm, trải dài trên toàn cầu. Các ghi chép số học đã được tìm thấy ở Babylon và Ai Cập, và có bằng chứng sự tồn tại của nó cách đây hàng nghìn năm ở Hy Lạp, La Mã, Nhật Bản và Trung Quốc.<br/> <br/>
                        Người Chaldean hay được gọi là người Babylon đã nghiên cứu sâu về cả chiêm tinh học, số học và thực sự là những người đầu tiên xác định mối tương quan giữa các con số với dao động của vũ trụ nên còn được gọi là Chaldean Numerology. Qua nhiều thời đại, số học đã phát triển và được biết đến với tên tuổi của Pythagoras.<br/> <br/>
                        Ông là một triết gia, nhà toán học người Hy Lạp sống trong thời đại 590 trước công nguyên đã biết đến Chaldean và xây dựng trên nó, bổ xung các triết lý và toán học của riêng mình do đó hình thành hệ số Pythagoras. Theo thuyết học Pythagoras, mọi con số, bất kể lớn hay nhỏ luôn có thể rút gọn được thành 1 chữ số từ 1 đến 9, và mỗi chữ số rút gọn đó mang rung động vũ trụ riêng.<br/><br/>
                        Vào đầu những năm 1900, tiến sĩ Julian Stenton đã ghi lại các yếu tố khác nhau của số học và phổ biến nó, đặt ra thuật ngữ "Numerology". Từ những năm 1970 số học đã được mọi người ở mọi tầng lớp xã hội sử dụng như một công cụ tự trợ giúp được cá nhân hóa. "Các con số không nói dối" là một tuyên bố sâu sắc của các nhà nghiên cứu, khẳng định con số biểu lộ tính cách và các sự kiện mà con người trải qua với độ chính xác đáng kinh ngạc.<br/> <br/>
                        Ngày nay, Numerology được thực hành trên khắp thế giới và được hàng triệu người sử dụng để giúp cho cuộc sống trở nên tốt đẹp hơn.
                    </p>
        EOD;
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                $pdf->AddPage();
                $html = <<<EOD
                    <h2 style="text-align: center;">Học viện cổ hoc Sala</h2>
        EOD;
                $html .= <<<EOD
                    <p>
                        Dựa trên ý nghĩa cao đẹp của Sala - loài hoa linh thiêng biểu tượng của Phật giáo. HỌC VIỆN CỔ HỌC SALA mang trong mình sứ mệnh tạo niềm vui, sự an lạc và thịnh vượng. Chúng tôi mong muốn mang ứng dụng tinh hoa của cổ học vào cuộc sống một cách đơn giản và hiệu quả nhất.<br/> <br/>
                        HỌC VIỆN CỔ HỌC SALA tự hào là cầu nối đưa Thần Số Học đến gần hơn với mỗi cá nhân, mỗi gia đình và mỗi doanh nghiệp. Tại đây chúng tôi cung cấp các kiến thức giúp hỗ trợ phát triển toàn diện bản thân cho từng cá nhân, gia đình hay doanh nghiệp có thể hiểu và ứng dụng được Thần Số Học trong việc xây dựng bản đồ kế hoạch cuộc đời, có định hướng tương lai rõ ràng để gặt hái thành công toàn diện.<br/> <br/>
                        Với Đội ngũ chuyên gia tư vấn chuyên nghiệp, nhiệt tình với nhiều năng kinh nghiệm trong việc tham vấn và ứng dụng Thần Số Học vào đời sống. HỌC VIỆN CỔ HỌC SALA mong muốn lan tỏa giá trị của Thần Số Học đến với cộng đồng từ đó xây dựng một Việt Nam Thịnh Vượng và Phát Triển.<br/> <br/>
                    </p>
        EOD;
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                $pdf->AddPage();
                // set bookmark
                $this->setPageBookmark($pdf, $aryReturn);
                $this->setTOCPage($pdf);
                // build data
                $html = <<<EOD
        EOD;

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        if ($request->type == "sendmail") {
            $data = $pdf->output();
            Job::dispatch($dulieu, $data);
            return redirect('/tai-khoan/lich-su-tra-cuu')->with('msg', "Hệ thống đã gửi file luận giải vào email $dulieu->email. cảm ơn bạn đã sử dụng dụng vụ của Thần Số Học Sala.");
        }
        else if ($request->type == "download") {
            $pdf->Output("Giai-ma-cuoc-doi-$buildNameFile.pdf", 'D');
        }
        else {
            $pdf->Output("Giai-ma-cuoc-doi-$buildNameFile.pdf", 'I');
        }
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
}
