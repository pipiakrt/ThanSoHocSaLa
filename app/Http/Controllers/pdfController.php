<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Services\ThanSoHoc\DefinedDataComponent;
use App\Services\ThanSoHoc\UtilsComponent;;

class pdfController extends Controller
{
    public function index()
    {
        // get thanso
        $dataDefineComponent = new DefinedDataComponent();
        $name = "Trần Văn Kiên";
        $buildName = $dataDefineComponent->convertAccentedCharacters($name);
        $buildNameFile = str_replace(' ', '-', $buildName);
        $birthday = "03/09/2000";
        $dayBirth = "03";
        $utilsComponent = new UtilsComponent();
        $aryThanSo = $utilsComponent->getThanSo($name, $birthday, false);
        // $this->contentModel = new ContentsTable();
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
        foreach ($aryThanSo['thapDinhCao'][4] as $dinhCao) {
            $aryReturn['LUAN_GIAI']['DINH_CAO'][] = $this->getContents('TDC', $dinhCao);
        }
        foreach ($aryThanSo['thapThachThuc'][4] as $tThachThuc) {
            $aryReturn['LUAN_GIAI']['THACH_THUC'][] = $this->getContents('TTT', $tThachThuc);
        }
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = '- Chu kỳ 1: 0-' . $aryThanSo['chuKyRenLuyen'][3][1] . ' tuổi: ' . $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][0]);
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = '- Chu kỳ 2: ' . ($aryThanSo['chuKyRenLuyen'][3][1] + 1) . '-' . $aryThanSo['chuKyRenLuyen'][3][2] . ' tuổi: ' . $this->getContents('RLDD', $aryThanSo['chuKyRenLuyen'][1]);
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
                    <p>Chào bạn $name,<br/> <br/>
        Bạn đang cầm trên tay bài “báo cáo Thần Số Học” của riêng mình. Trước khi khám phá bản thân, hãy chắc rằng bạn đã nắm vững những thông tin cơ bản dưới đây.<br/> <br/>
        Thứ nhất, bài báo cáo Thần Số Học được chia làm 19 chỉ số, các chỉ số đại diện cho: tính cách, năng lực cùng những ưu điểm và hạn chế,... trong mỗi con người chúng ta. Từ đó giúp bạn phác họa được “bức tranh” của cuộc đời mình để định hướng và phát huy năng lực vượt trội của chính bản thân mình.<br/> <br/>
        Thứ 2, Thần Số Học là một bộ môn khoa học, không phải là duy tâm và chúng không dự đoán được tương lai. Thần Số Học chỉ là dự đoán tiềm năng của bạn và phần còn lại là phụ thuộc vào chính bản thân bạn. Chúng cung cấp cho bạn một khuôn khổ, tuy nhiên còn phải phụ thuộc vào nhiều yếu tố: ý chí, sự lựa chọn hay các yếu tố môi trường nằm ngoài tầm kiểm soát của bạn.<br/><br/>
        Thứ ba, bạn hoàn hảo theo các của mình nên không cần so sánh các chỉ số của mình với người khác, mỗi người có một ưu điểm vượt trội riêng và bạn cũng thế. Tích cực và tiêu cực  là do sự nhận thức và cân bằng liên tục của bạn trong đời sống. Chuyên gia của chúng tôi sẽ giúp bạn thấy rõ những chuyển đối thủ vị đó trong tính cách của mình. <br/> <br/>
        Cuối cùng, xin hãy nhớ rằng sức mạnh và tiềm năng của bạn tuyệt vời hơn bạn nghĩ rất nhiều. Và đích đến cuối cùng của mỗi chúng ta đều là sự HẠNH PHÚC và BÌNH AN.<br/> <br/>
        “Tôi cũng vậy! Bạn cũng thế! Hãy bắt đầu hành trình “THẤU HIỂU bản thân, KHAI PHÁ năng lực và ĐÁNH THỨC khả năng TIỀM ẨN trong con người bạn” nào !!!
        </p>
        EOD;
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                $pdf->AddPage();
                $html = <<<EOD
                    <h2 style="text-align: center;">Đôi nét về lịch sử Thần Số Học</h2>
        EOD;
                $html .= <<<EOD
                    <p>Thần Số Học - Numerology (tên tiếng Anh của Thần Số Học) được khi ghi nhận trong suốt lịch sử của các nước cổ đại: Ai Cập, Babylon, Châu Á và Ấn Độ, và cũng xuất hiện nhiều trong Kinh Thánh. Cách đây hơn 2500 năm các nước cổ đại trong lịch sử đã tạo ra các con số và áp dụng ý nghĩa của các con số. Thần Số Học lập ra dựa theo nhân sinh quan của Thần Tam Giác (Divine Triangle). Thần số học dựa vào việc nghiên cứu ý nghĩa của các sóng rung và trường năng lượng của vũ trụ để tạo ra các con số và ảnh hưởng của nó tới cuộc sống con người.<br/> <br/>
        Pythagoras được biết đến một nhà triết học, toán học, thần học người Hy Lạp. Ông là người đặt nền tảng cho toán học, chiêm tinh học, thiên văn học và vật lý học. Chúng bao gồm siêu hình học của các con số – phương pháp xem các con số không chỉ là số lượng và thước đo mà còn là tốc độ rung động. Từ những lời dạy của Pythagoras, chúng ta biết rằng: âm nhạc, thiên nhiên trên thực tế chính là toán học, là sự rung động của các con số. Tại các tài liệu lịch sử, người ta biết đến Pythagoras là một người đã khám phá ra khoa học về giai điệu âm nhạc, hòa âm, tất nhiên là thần số học nữa.<br/> <br/>
        Pythagoras đã nói rằng: “Các con số, bất kể lớn nhỏ, tất cả luôn được rút gọn trong dãy số từ 1 đến 9 và mỗi con số sẽ có một sự dao động vũ trụ kỳ dị". Từ những phát hiện trên, Pythagoras đã áp dụng vào các giai đoạn trong vòng đời của mỗi con người chính xác một cách kỳ lạ.<br/><br/>
        Chính vì sự chính xác kỳ lạ ấy mà Thần Số Học Pythagoras đã thống trị phương Tây. Mặc dù trước đó, tại Babylon cũng đã nhận ra và dựa vào các con số từ 1 đến 8. Con số 9 được coi là con số linh thiêng, thánh thiện nên đã được tách biệt với các con số khác. Hay như Kabbalah ở Do Thái cũng đã tập trung vào tên và dựa trên 22 ý nghĩa rung động khác nhau của bảng chữ cái tiếng Do Thái từ đó điều chỉnh cho phù hợp với bảng chữ cái La Mã gồm 26 chữ cái và sử dụng biểu đồ số Pythagore. Hệ thống này không xem xét ngày sinh, đó có thể là lý do tại sao nó chưa bao giờ trở nên phổ biến đối với các nhà Thần số học phương Tây, vì ngày sinh là cốt lõi của Thần số học phương Tây.<br/> <br/>
        </p>
        EOD;
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                $pdf->AddPage();
                $html = <<<EOD
                    <h2 style="text-align: center;">Học viện cổ hoc Sala</h2>
        EOD;
                $html .= <<<EOD
                    <p>Dựa trên ý nghĩa cao đẹp của Sala - loài hoa linh thiêng biểu tượng của Phật giáo. HỌC VIỆN CỔ HỌC SALA mang trong mình sứ mệnh tạo niềm vui, sự an lạc và thịnh vượng. Chúng tôi mong muốn mang ứng dụng tinh hoa của cổ học vào cuộc sống một cách đơn giản và hiệu quả nhất.<br/> <br/>
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
     * @param $key
     * @param $chiSo
     * @return string
     */
    private function getContents($key, $chiSo)
    {
        $aryCondition = array(
            'page_key' => 'CS',
            'page_code' => 'CS-' . $key . '-' . $chiSo
        );
        $content = '';
        $aryData = $this->contentModel->getDataByCondition($aryCondition);
        if (!empty($aryData)) {
            $content = CommonComponent::removeStyleSheet($aryData[0]['page_content']);
        }
        return $content;
    }
}
