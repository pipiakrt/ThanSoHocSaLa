<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PDF;
use App\Services\ThanSoHoc\DefinedDataComponent;
use App\Services\ThanSoHoc\UtilsComponent;
use App\Services\ThanSoHoc\MYPDF;
use App\Models\ThanSo as Model;
use App\Mail\guiLuanGiaiPDF;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mail;

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
        if ($request->type == "sendmail") {
            $path = storage_path('/app/public') . "/Giai-ma-cuoc-doi-$buildNameFile-$dulieu->id-.pdf";
            $pdf->Output("$path", 'F');
            $mail = new guiLuanGiaiPDF($path);
            $mail->subject('Thần Số Học Sala đã gửi file luận giải');
            $mail->from(env('MAIL_USERNAME'), 'Thần Số Học Sala');
            Mail::to($dulieu->email)->send($mail);
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
        $aryReturn['CHI_SO_LAP'] = null;
        return [
            [
                'Phần I: Khám phá & rèn luyện bản thân',
                1,
                'Ở phần này, chúng tôi sẽ giúp bạn tìm ra nguyên nhân khiến bạn có những suy nghĩ tiêu cực, cũng như lý do tại sao bạn chưa đạt được kết quả như bạn mong muốn. Từ đó đưa ra  phương pháp nuôi dưỡng nội lực bên trong để giúp bạn có một suy nghĩ tích cực và ý chí mạnh mẽ.'
            ],
            [
                'Tâm hồn',
                2,
                $aryReturn['TAM_HON']
            ],
            [
                'Nhân cách',
                2,
                $aryReturn['NHAN_CACH']
            ],
            [
                'Chỉ số cân bằng tâm hồn và nhân cách',
                2,
                $aryReturn['CAN_BANG_TH_NC']
            ],
            [
                'Chỉ số phản ứng (Thái độ)',
                2,
                $aryReturn['PHAN_UNG']
            ],
            [
                'Ngày sinh',
                2,
                $aryReturn['NGAY_SINH']
            ],
            [
                'Cân bằng',
                2,
                $aryReturn['CAN_BANG']
            ],
            [
                'Chỉ số khuyết thiếu (Nợ bài học)',
                2,
                $aryReturn['KHUYET_THIEU']
            ],
            [
                'Chỉ số thách thức (Nợ nghiệp)',
                2,
                $aryReturn['THACH_THUC']
            ],
            [
                'Chỉ số lặp',
                2,
                $aryReturn['CHI_SO_LAP']
            ],
            [
                'Biểu đồ năng lực và biểu đồ Birth chart',
                3,
                $aryReturn['BIEU_DO']['NANG_LUC']
            ],
            [
                'Biểu đồ tổng hợp',
                11,
                $aryReturn['BIEU_DO']['NANG_LUC']
            ],
            [
                'Phần II: Sứ mệnh cuộc đời và con đường phát triển',
                1,
                'Sau khi bạn đã hiểu và rèn luyện được bản thân, thì tại đây chúng tôi sẽ giúp bạn có tìm ra con đường ngắn nhất đi đến đỉnh cao của sự nghiệp, tìm ra được công việc bạn làm tốt nhất và những thứ xã hội cần mà bạn có thể làm tốt nhất.'
            ],
            [
                'Đường đời',
                2,
                $aryReturn['DUONG_DOI']
            ],
            [
                'Sứ mệnh',
                2,
                $aryReturn['SU_MENH']
            ],
            [
                'Chỉ số cân bằng đường đời và sứ mệnh',
                2,
                $aryReturn['CAN_BANG_DD_SM']
            ],
            [
                'Trưởng thành',
                2,
                $aryReturn['TRUONG_THANH']
            ],
            [
                'Tháp đỉnh cao',
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
                'Tháp thách thức',
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
                'Chu kỳ rèn luyện đường đời',
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
                'Biểu đồ năm thần số',
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
                'Phần III: Lời khuyên cho bạn',
                1,
                'Cuối cùng, chúng tôi sẽ đưa ra những lời khuyên để giúp bạn DUY TRÌ năng lượng TÍCH CỰC và BÌNH AN trong cuộc sống'
            ],
            [
                'Phát triển bản thân',
                2,
                ''
            ],
            [
                'Xây dựng sự nghiệp',
                2,
                ''
            ],
            [
                'Lựa chọn đối tác và người đồng hành',
                2,
                ''
            ],
            [
                'Sứ mệnh cuộc đời của bản thân và xã hội',
                2,
                ''
            ],
            [
                'Cuộc đời bình an, hạnh phúc, viên mãn',
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
        $pdf->Text(87, 60, '('.$chiSoRenluyen[0].'-'.$chiSoRenluyen[1].' tuổi)');
        $pdf->Text(87, 65, $aryData[1].' - Tháng Sinh');
        $pdf->Text(120, 91, 'Chu kỳ 2');
        $pdf->Text(118, 96, '('.($chiSoRenluyen[1] + 1).'-'.$chiSoRenluyen[2].' tuổi)');
        $pdf->Text(118, 101, $aryData[0].' - Ngày Sinh');
        $pdf->Text(65, 95, 'Chu kỳ 3');
        $pdf->Text(65, 100, '('.$chiSoRenluyen[2].'++ tuổi)');
        $pdf->Text(65, 105, $aryData[2].' - Năm Sinh');
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
