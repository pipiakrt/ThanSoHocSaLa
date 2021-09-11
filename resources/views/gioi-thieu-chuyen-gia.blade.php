
@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
    <link rel="stylesheet" href="/css/gioi-thieu-cg.css">
@endpush

<x-slogan />


<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Chuyên Gia</a></li>
        </ol>
    </div>
</nav>

<main>
    <div class="sliders cts position-relative">
        <div id="sliders" class="owl-carousel owl-theme">
            <div class="item">
                <img class="header-logo" alt="Thần Số Học" src="/img/gioithieu/cn.png">
            </div>
            <div class="item">
                <img class="header-logo" alt="Thần Số Học" src="/img/gioithieu/cn.png">
            </div>
        </div>
    </div>

    <div class="bia text-center">
        <img class="mw-100" src="/img/gioithieu/sach1.png" alt="">
    </div>

    <div class="main-cauchuyen py-5">
        <div class="main-1">
            <div class="container">
                <div class="row justify-content-center g-0 my-4">
                    <div class="col-sm-12 col-md-10 col-lg-11">
                        <div class="descs1 px-0">
                            <span>Chuyên gia Nguyên Hồng.</span>
                        </div>
                        <div class="descs1 px-0 mt-4">
                            <span>Với nhiều năm nghiên cứu khả năng tiềm ẩn và năng lực bẩm sinh của con người tại “Viện Nghiên Cứu Và Ứng Dụng Tiềm Năng Con Người” thì cho tới năm 2016 sau khi được lĩnh hội Thần số học từ một người thầy của mình dựa trên cuốn sách The Complete Book of Numerology của Tiến sĩ David A. Phillips. Cô đã rất hứng thú với bộ môn này nên đã tự mình học hỏi và tìm hiểu sâu hơn nữa.</span>
                        </div>
                        <div class="descs1 px-0 mt-4">
                            <span>Sau khoảng thời gian nghiên cứu và chiêm nghiệm về Thần số học, cô nhận thấy đây là một công cụ hỗ trợ cho con người phát triển toàn diện vô cùng hiệu quả. Khả năng ứng dụng Thần số học trong việc khai phá và tìm ra những tiềm năng cũng định hướng được đường đi cho mỗi người để tránh rơi vào cảm giác chông chênh là vô cùng lớn, nó có thể đáp ứng được nguyện vọng mang lại giá trị phát triển cho cộng đồng và xã hội.</span>
                        </div>
                        <div class="descs1 px-0 mt-4">
                            <span>Việc ứng dụng Thần số học vào trong đời sống sẽ giúp cho mỗi cá nhân có thể thấu hiểu được bản thân mình hơn, những bạn trẻ có thể tìm được điểm mạnh, hạn chế và trau dồi kiến thức để tạo cho mình giá trị bản thân từ sớm, sống có mục đích để cuộc đời trở nên thật ý nghĩa, giúp những thành viên trong gia đình thấu hiểu, đồng cảm và yêu thương lẫn nhau, doanh nghiệp có thể điều phối nhân sự mà không bỏ lỡ tài năng của từng cá nhân từ đó tạo nên nền móng vững chắc kéo theo sự phát triển doanh nghiệp lâu dài.</span>
                        </div>
                        <div class="descs1 px-0 mt-4">
                            <span>Với mong muốn mang lại và cho đi những giá trị hữu ích, thiết thực giúp mọi người có thể sớm phát triển bản thân để đạt được đỉnh cao hạnh phúc, thành công và chạm tới Bình An thật sớm. Chuyên gia NGUYÊN HỒNG và HỌC VIỆN CỔ HỌC SALA đã hợp tác cùng nhau để truyền bá bộ môn này một cách rộng rãi và lan tỏa những thông điệp tốt đẹp đến từng người.</span>
                        </div>
                        <div class="descs1 px-0 mt-4">
                            <span>Càng nghiên cứu và thực hành cô càng say mê hơn, mỗi lần tham vấn cô luôn nhận được những phản hồi tích cực giúp cô có thêm cho mình niềm tin chắc chắn về việc ứng dụng Thần số học vào trong đời sống để lan tỏa giá trị nhân văn này đến cộng đồng. Và vào đầu năm 2021 Chuyên gia NGUYÊN HỒNG đã cùng HỌC VIỆN CỔ HỌC SALA bắt đầu cho ra đời cuốn sách với tên gọi “Cuốn Sách Cuộc Đời” để giúp mỗi người có thể hiểu và ứng dụng được Thần số học vào trong cuộc sống. Sự ra đời của cuốn sách này hướng đến mục đích mỗi cá nhân đều có thể tự thấu hiểu và trau dồi bản thân, xác định được mục đích cuộc đời đối với chính mình và xã hội cùng những lời khuyên từ chuyên gia của SALA GROUP với từng chỉ số của họ. Mỗi cá nhân hay doanh nghiệp đều sẽ có “Cuốn sách cuộc đời” của riêng mình sẽ mang lại sự thấu hiểu từ sâu bên trong để tạo ra nội lực phát triển lâu dài.</span>
                        </div>
                        <div style="width: fit-content;" class="descs1 mx-auto px-0 my-5">
                            <img class="mw-100" src="/img/gioithieu/tuhao.png" alt="">
                        </div>

                        <iframe class="w-100 mt-4 youtube-responsive" height="450" src="https://www.youtube.com/embed/Q3ooMw9WsZA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ketqua sanpham ct">
        <div class="content-ketqua">
            <div class="container container-ketqua">
                <div class="text-center">
                    <img class="mw-100" src="/img/gioithieu/bor.png" alt="">
                </div>
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="share-ketqua text-white">
                            <div class="titlecs text-center"><h4>nhận giải mã trực tiếp</h4></div>
                            <div class="desccs fw-lighter">
                                <div><span>Bạn muốn biết chi tiết hơn về những LỜI KHUYÊN DÀNH CHO BẠN, GIẢI MÃ VẬN MỆNH, THĂNG TRẦM CUỘC SỐNG và LÊN KẾ HOẠCH CHO TỪNG NĂM. Hãy đăng ký TRA CỨU CHUYÊN SÂU NGAY BÂY GIỜ.</span></div>
                            </div>
                            <div class="btn-ketqua text-center">
                                <a href="/tai-khoan/tra-cuu-nang-cao">
                                    <button>TRA CỨU CHUYÊN SÂU</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5">
            <img class="mw-100" src="/img/gioithieu/cn.png" alt="">
        </div>
    </div>

</main>

@endsection


