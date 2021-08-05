@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">

<style>
    .mr-0 {
        margin-right: 0px !important;
    }
    .ketqua-service {
        background-color: #e7f1e9;
        margin-top: 0;
    }
    .ketqua-service .gia-tri-cot-loi {
        background-color: unset;
        min-height: unset;
        margin-top: 0;
        border-top-left-radius: unset;
        border-bottom-right-radius: unset;
    }
    .ketqua-service .gia-tri-cot-loi .d-flex {
        margin-bottom: 30px;
    }
    .ketqua-service .gia-tri-cot-loi .titlecotloi {
        padding-top: 100px;
    }
    .tieudegoi {
        background-color: #03402f;
    }
    .tieudegoi .tengoi h3 {
        color: #608f6c;
        margin-bottom: 0;
    }
    .tieudegoi .active {
        background-color: #097364;
    }
    .tieudegoi .active .tengoi h3 {
        color: white;
    }
    .tieudegoi .tengoi {
        text-align: center;
        padding: 53px 0;
    }
    .thongtingoi .maingoi {
        background-color: #097364;
        background-color: white;
    }
    .thongtingoi .carousel-item {
        transition: transform .1s !important;
    }
    .sanpham {
        background-color: #097364;
        min-height: unset;
        padding: unset;
        background-image: unset;
    }
    .sanpham .content-ketqua .share-ketqua {
        padding: 150px 0;
    }
    .sanpham .content-ketqua .titlecs.text-center h4 {
        margin-right: 0%;
    }
    .sanpham .content-ketqua .desccs {
        margin-left: 0%;
        margin: auto;
        font-size: 18px;
        font-weight: 200 !important;
        margin-top: 30px;
    }
    .sanpham .btn-ketqua {
        margin-top: 50px;
        margin-right: 0%;
    }
    @font-face {
        font-family: 'iCiel DIN Pro Condensed';
        src: url(/fonts/DinPro/DINPro-CondMedium.ttf);
        font-weight: 500;
    }
    .thongtingoi {
        background-color: #e7f1e9;
    }
    .thongtingoi .item .hd1 {
        font-family: "Open Sans", sans-serif;
        color: rgb(238, 118, 17);
        font-size: 23px;
        font-weight: bold;
        text-align: center;
        line-height: 1.6;
    margin-bottom: 0;
    }
    .thongtingoi .item .hd2 {
        font-family: "Open Sans", sans-serif;
        color: rgb(0, 0, 0);
        font-size: 20px;
        line-height: 1.6;
        font-weight: 200;
    }
    .thongtingoi .item .title h4 {
        font-family: "Open Sans", sans-serif;
        color: rgb(0, 0, 0);
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        line-height: 1.6;
        margin-bottom: 0;
    }
    .thongtingoi .item .desc span {
        font-family: "Open Sans", sans-serif;
        color: rgb(0, 0, 0);
        font-size: 15px;
        text-align: justify;
        line-height: 1.6;
    }
    .thongtingoi ul {
        list-style: none; /* Remove default bullets */
    }

    .thongtingoi ul li::before {
        content: "\2022";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
        color: rgb(238, 118, 17); /* Change the color */
        font-weight: bold; /* If you want it to be bold */
        display: inline-block; /* Needed to add space between the bullet and the text */
        width: 1em; /* Also needed for space (tweak if needed) */
        margin-left: -1em; /* Also needed for space (tweak if needed) */
    }
    .thongtingoi .item .desc {
        /* border: 2px dashed #608f6c; */
        /* color: #faefe3; */
        padding: 0 50px;
        font-size: 18px;
        font-weight: 200;
        position: relative;
        /* height: 100%; */
    margin-top: 8px;
    }
    .thongtingoi .item img.hoicham {
        position: absolute;
        bottom: -30px;
        right: 0;
    }
    .thongtingoi .itembg {
        background-color: #03402f;
        padding: 25px 0;
        height: 150px;
    }
    .thongtingoi .itembg.c {
        height: 200px;
    }
    .thongtingoi .itembg h3 {
        font-family: 'iCiel DIN Pro Condensed';
        font-size: 28px;
        color: #faefe3;
        text-transform: uppercase;
        inline-size: max-content;
    }
    .thongtingoi .itembg .desc1 {
        font-size: 18px;
        border-top: 1px solid #097364;
        padding-top: 10px;
    }
</style>

@endpush

@section('content')

<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
        </ol>
    </div>
</nav>


<main>
    <div class="sliders">
        <div id="sliders" class="owl-carousel owl-theme">
            <div class="item">
                <img class="header-logo" alt="Thần Số Học" src="/img/sliders/2.png">
            </div>
            <div class="item">
                <img class="header-logo" alt="Thần Số Học" src="/img/sliders/2.png">
            </div>
        </div>
    </div>
    <div class="tieudegoi">
        <div class="container px-0 px-lg-4 pt-5">
            <div class="row g-0 h-100">
                <div class="col-md-6">
                    <div class="eventItem2 active item" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0">
                        <div class="tengoi">
                            <h3>GÓI CÁ NHÂN</h3>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="eventItem2 item" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1">
                        <div class="tengoi">
                            <h3>GÓI GIA ĐÌNH</h3>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="eventItem2 item" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="2">
                        <div class="tengoi">
                            <h3>GÓI DOANH NGHIỆP</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .thongtingoi .item .image {
            height: 230px;
            position: relative;
            width: 100%;
        }
        .thongtingoi .item .image .avatar {
            width: 332.525px;
            height: 552.013px;
            top: 0px;
            left: 0px;
            position: absolute;
            background-repeat: no-repeat;
            background-size: contain;
        }
        .thongtingoi .item .image .avatar.c1 {
            background-image: url(https://w.ladicdn.com/s650x900/60bf1c0b1a02f2001216e7d5/landingpage-level10-2-20210715120101.png);
        }
        .thongtingoi .item .image .avatar.c2 {
            background-image: url(https://w.ladicdn.com/s650x900/60bf1c0b1a02f2001216e7d5/landingpage-level10-3-20210715120110.png);
        }
        .thongtingoi .item .image .avatar.c3 {
            background-image: url(https://w.ladicdn.com/s650x900/60bf1c0b1a02f2001216e7d5/landingpage-level10-4-20210715120119.png);
        }
        .thongtingoi .item .titlea {
            background-color: rgb(239, 239, 239);
            border-radius: 13px;
            height: 124px;
            display: flex;
            align-items: center;
    justify-content: center;
        }
        .thongtingoi .item .titlea .gr-tl {
            font-family: "Open Sans", sans-serif;
            color: rgb(238, 122, 21);
            font-size: 17px;
            text-align: center;
            line-height: 1.6;
            max-width: 750px;
        }
    </style>
    <div class="thongtingoi">
        <div class="container px-0 px-lg-4">
            <div class="maingoi px-0 px-lg-5">
                <div id="carouselExampleCaptions2" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <div class="item px-0 px-md-4 py-4">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="title text-center py-4">
                                            <h5 class="hd1">MỘT LẦN MẤT KIỂM SOÁT</h5>
                                            <h5 class="hd1">ĐÁNH MẤT HẠNH PHÚC CẢ CUỘC ĐỜI</h5>
                                            <h5 class="hd1">Nóng giận - Đổ lỗi - Phán xét - Chê bai</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <div class="row g-0 justify-content-center g-lg-4">
                                            <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                <div class="image">
                                                    <div class="avatar c1"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT YÊU THƯƠNG</h4>
                                                    <h4>TRONG GIA ĐÌNH</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Vợ chồng bất đồng, tranh cãi, tức giận nhất thời có thể ly tán cả một cuộc hôn nhân</span></li>
                                                        <li><span>Cha mẹ con cái khó chịu, không cùng chung ý kiến, tức giận nhất thời có thể không bao giờ nhìn mặt nhau</span></li>
                                                        <li><span>Anh chị em đỗ lỗi, chê bai, tức giận nhất thời có thể xung đột mãi mãi</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                <div class="image">
                                                    <div class="avatar c2"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT CƠ HỘI THĂNG TIẾN</h4>
                                                    <h4>THÀNH CÔNG TRONG CÔNG VIỆC</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Tranh cãi, chê bai nhau, tức giận nhất thời với đồng nghiệp có thể mất nguồn lực trong công ty</span></li>
                                                        <li><span>Bất đồng , khó chịu, tức giận nhất thời với sếp có thể mất việc và mất niềm tin</span></li>
                                                        <li><span>Phán xét, mâu thuẫn, tức giận nhất thời với đối tác có thể mất hợp đồng, mất doanh thu</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                <div class="image">
                                                    <div class="avatar c3"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT MỐI QUAN HỆ</h4>
                                                    <h4>TRONG XÃ HỘI</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Phán xét, bắt bẻ bạn bè, tức giận nhất thời có thể giết chết tình bạn cả 10 năm</span></li>
                                                        <li><span>Bất đồng, tranh cãi, tức giận nhất thời với người yêu có thể chấm dứt một mối quan hệ đang tốt đẹp</span></li>
                                                        <li><span>Khó chịu, đánh giá, tức giận với mọi người có thể khiến mình căng thẳng và bị xa lánh</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 px-0 mt-5">
                                        <div class="titlea text-center">
                                            <div>
                                                <div class="gr-tl"><span>NẾU BẠN THƯỜNG XUYÊN NÓNG GIẬN, KHÔNG THỂ KIỂM SOÁT NHỮNG CẢM XÚC TIÊU CỰC CỦA MÌNH. BẠN KHÔNG MUỐN TRẢ GIÁ CHO SỰ NGU DẠI NHẤT THỜI ĐÓ</span></div>
                                                <div class="gr-tl"><span>THÌ ĐÂY CHÍNH LÀ GIẢI PHÁP DÀNH CHO BẠN!</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title text-center py-5 mt-4">
                                            <h3>GÓI SẢN PHẨM NÀY SẼ GIÚP BẠN:</h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="w-100">
                                            <div class="row g-0 justify-content-center g-lg-4">
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/b.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Tự mình mở cách cửa trí tuệ bên trong và biết cách phát triển bản thân</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/c.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Tạo sự kết nối với nguồn năng lượng về sự thịnh vượng để có sự giàu có bền vững</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/d.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Tạo niềm tin và cài đặt sâu niềm tin, gieo hạt giống thịnh vượng</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/e.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Sống một cuộc đời trọn vẹn và đầy ý nghĩa</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-4">
                                        <div class="btn-ketqua text-center mr-0">
                                            <a href="/tai-khoan/gio-hang/ca-nhan">
                                                <button>Mua Ngay</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="item px-0 px-lg-4 py-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title text-center text-white py-4">
                                            <h5 class="fw-light">NẾU BẠN ĐANG GẶP VẤN ĐỀ SAU:</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="desc">
                                            <span>Vợ chồng không thấu hiểu lẫn nhau, không cảm thấy hạng phúc</span>
                                            <img class="hoicham" src="/img/icon/hoicham.png" alt="Thần số học sala">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="desc">
                                            <span>Mong muốn định hướng đúng tương lai cho các con</span>
                                            <img class="hoicham" src="/img/icon/hoicham.png" alt="Thần số học sala">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="desc">
                                            <span>Các thế hệ trong gia đình có những mâu thuẫn không cần thiết</span>
                                            <img class="hoicham" src="/img/icon/hoicham.png" alt="Thần số học sala">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="desc">
                                            <span>Định hướng của gia đình và mong muốn của các con không đồng nhất</span>
                                            <img class="hoicham" src="/img/icon/hoicham.png" alt="Thần số học sala">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title text-center text-white py-5 mt-4">
                                            <h3>GÓI SẢN PHẨM NÀY SẼ GIÚP BẠN:</h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="w-100">
                                            <div class="row g-0 g-lg-4 mb-5">
                                                <div class="col-md-4">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/a.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <h3>THẤU HIỂU NGƯỜI THÂN</h3>
                                                                </div>
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Thấu hiểu vợ/chồng và bố mẹ, cách giao tiếp, tính cách của từng người để có cách ứng xử phù hợp mà vẫn yêu thương, xây dựng gia đình hạnh phúc.</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/a.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <h3>Những lời khuyên tích cực</h3>
                                                                </div>
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Đưa ra lời khuyên giúp cho các thành viên có góc nhìn tích cực hơn, có động lực để thay đổi và phát triển.</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/a.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <h3>truyền cảm hứng cho con cái</h3>
                                                                </div>
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Thấu hiểu con cái, biết được con mình đang mong muốn điều gì, phù hợp với ngành nghề, lĩnh vực nào để từ đó định hướng, tư vấn và truyền cảm hứng giúp con phát triển đồng đều giữa năng lực và đam mê</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-4">
                                        <div class="btn-ketqua text-center mr-0">
                                            <button>COMING SOON</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="item px-0 px-lg-4 py-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title text-center py-4">
                                            <h5 class="hd1">MỘT LẦN MẤT KIỂM SOÁT</h5>
                                            <h5 class="hd1">ĐÁNH MẤT SỰ NGHIỆP CẢ CUỘC ĐỜI</h5>
                                            <h5 class="hd1">Bảo thủ - Chỉ trích - Đổ lỗi - Chê bai</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <div class="row g-0 g-lg-4">
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c1"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT SỰ PHÁT TRIỂN DOANH</h4>
                                                    <h4>NGHIỆP VÌ KHÔNG BIẾT CÁCH</h4>
                                                    <h4>ĐIỀU PHỐI NHÂN SỰ</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Bảo thủ, chỉ trích, xu nịnh, sếp nói sao nghe vậy</span></li>
                                                        <li><span>Đánh giá thấp người có năng lực, không thường xuyên trao đổi</span></li>
                                                        <li><span>Đề cao chủ nghĩa cá nhân và lan truyền cảm xúc tiêu cưc</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c2"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT DOANH NGHIỆP</h4>
                                                    <h4>KHÔNG CÓ ĐỊNH HƯỚNG, KẾ HOẠCH</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Suy nghĩ ngắn hạn, chỉ tập trung vào lợi nhuận mà không phát triển doanh nghiệp</span></li>
                                                        <li><span>Tư duy trong “tháp” - tức chỉ dựa trên đặc trưng và sự tác động đến một bộ phận sẽ làm hạn chế những ý tưởng và làm suy yếu hoạt động của công ty</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c3"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT MỐI QUAN HỆ</h4>
                                                    <h4>TRONG XÃ HỘI</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Đánh giá thấp các mối quan hệ, không tập trung xây dựng các mối quan hệ trong và ngoài công ty</span></li>
                                                        <li><span>Không chú ý đến các nhu cầu mang tính xã hội, bỏ qua nhu cầu phát triển của các thành viên, tạo cho nhân viên cảm giác không muốn đến văn phòng, chỉ làm việc rồi về</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 px-0 mt-5">
                                        <div class="titlea text-center">
                                            <div>
                                                <div class="gr-tl"><span>NẾU DOANH NGHIỆP BẠN KHÔNG PHÁT TRIỂN, KHÔNG THỂ KIỂM SOÁT NHỮNG THÔNG TIN XÚC TIÊU CỰC. NẾU BẠN KHÔNG MUỐN ĐÁNH MẤT DOANH NGHIỆP, SỰ NGHIỆP MÀ CẢ ĐỜI GÂY DỰNG</span></div>
                                                <div class="gr-tl"><span>THÌ ĐÂY CHÍNH LÀ GIẢI PHÁP DÀNH CHO BẠN!</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title text-center py-5 mt-4">
                                            <h3>GÓI SẢN PHẨM NÀY SẼ GIÚP BẠN:</h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="w-100">
                                            <div class="row g-0 g-lg-4 mb-5">
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/f.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Phát triển tư duy kinh doanh, xây dựng đội nhóm vững mạnh, biết cách lựa chọn và sử dụng nhân sự phù hợp</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/g.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu sâu về những khả năng tiềm ẩn, phát triển bản lĩnh nhà lãnh đạo, đưa doanh nghiệp đi lên</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/h.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Định hình sứ mệnh bản thân và doanh nghiệp của mình. Xây dựng được 1 văn hóa doanh nghiệp bền vững và trường tồn</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/i.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                {{-- <div class="col-10">
                                                                    <h3>góc nhìn mới giúp định</h3>
                                                                </div> --}}
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu được quy luật vận hành của doanh nghiệp để định hướng chiến lược kinh doanh trong năm nay và 3 năm tiếp theo</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-4">
                                        <div class="btn-ketqua text-center mr-0">
                                            <a href="/tai-khoan/gio-hang/doanh-nghiep">
                                                <button>Mua Ngay</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service2 ketqua-service" id="san-pham">
        <div class="container">
            <div class="gia-tri-cot-loi bds-lg-initial">
                <div class="titlecotloi text-dark text-center">
                    <h2 class="title-h1"><span class="h1">10</span> GIÁ TRỊ CHỈ CÓ TẠI</h2>
                    <h2 class="title-h1">BẢN ĐỒ CUỘC ĐỜI THẦN SỐ HỌC SALA</h2>
                </div>
                <div class="row g-0 px-0 px-lg-5">
                    <div class="col-lg-6">
                        <div class="block">
                            <div class="d-flex">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Cung cấp đầy đủ 19 chỉ số quan trọng toàn diện nhất dành cho bạn.</span></div>
                            </div>
                            <div class="d-flex">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Góc nhìn tích cực, xác định bản chất, tư vấn theo quan điểm xây dựng và phát triển bản thân.</span></div>
                            </div>
                            <div class="d-flex">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Cho bạn lời khuyên 3 năm sắp tới để đạt được đỉnh thành công.</span></div>
                            </div>
                            <div class="d-flex">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Hiểu sâu sắc bản thân, nhận biết điểm mạnh, điểm yếu để phát triển sức mạnh, năng lực nội tại bên trong bản thân bạn.</span></div>
                            </div>
                            <div class="d-flex">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Nhận thức năng lực thiên bẩm của bản thân làm chỗ dựa cho đam mê để lựa chọn công việc phù hợp với bạn.</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="block">
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Thấu hiểu con cái, vợ chồng của mình để đạt được hạnh phúc gia đình.</span></div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Được chuyên gia hỗ trợ luận giải và định hướng giải pháp, phát triển đột phá. </span></div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Hiểu rõ và điều phối nhân sự một cách hiệu quả nhất.</span></div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Phát triển tối đa năng lực cá nhân, tạo ra giá trị lớn cho bản thân và xã hội.</span></div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Có được điểm tựa để đi đúng định hướng bạn thân.</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ketqua sanpham">
        <div class="content-ketqua">
            <div class="container container-ketqua">
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="share-ketqua text-white">
                            <div class="titlecs text-center"><h4>nhận giải mã trực tiếp</h4></div>
                            <div class="desccs fw-lighter">
                                <div><span>Nếu bạn muốn biết chi tiết hơn về những lời khuyên phù hợp nhất, giải mã vận mệnh, thăng trầm và ý nghĩa từng năm. Khám phá Giải mã chi tiết chuyên sâu ngay.</span></div>
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

    </div>


</main>

{{-- <div class="container mb-5 mt-5">
    <div class="pricing card-deck flex-column justify-content-center flex-md-row mb-3 row">
        <div class="col-md-3">
            <div class="card card-pricing text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Cá Nhân</span>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15"><span class="price">950.000 </span><span class="h6 text-muted ml-2">vnđ</span></h1>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">
                        <li><h5>Tặng ngay</h5></li>
                        <li>01 cuốn sách cuộc đời của riêng bạn 150.000 vnđ</li>
                        <li>01 buổi tư vấn ứng dụng Thần Số Học cùng chuyên gia 500.000 vnđ</li>
                        <li><b>Tổng: 650.000 vnđ</b> </li>
                    </ul>
                    <a href="/tai-khoan/gio-hang/ca-nhan" class="btn btn-outline-secondary mb-3">Mua Ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-pricing popular shadow text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Doanh Nghiệp</span>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="45"><span class="price">1.900.000</span><span class="h6 text-muted ml-2">vnđ</span></h1>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">
                        <li><h5>Tặng ngay</h5></li>
                        <li>01 cuốn sách cuộc đời của chủ doanh nghiệp 150.000vnđ</li>
                        <li>01 cuốn sách cuộc đời cho doanh nghiệp 150.000vnđ</li>
                        <li>02 buổi tư vấn ứng dụng Thần Số Học cùng chuyên gia 1.000.000vnđ</li>
                    </ul>
                    <a href="/tai-khoan/gio-hang/doanh-nghiep" class="btn btn-primary mb-3">Mua Ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-pricing text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Cá Nhân</span>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15"><span class="price">950.000 </span><span class="h6 text-muted ml-2">vnđ</span></h1>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">
                        <li><h5>Tặng ngay</h5></li>
                        <li>01 cuốn sách cuộc đời của riêng bạn 150.000 vnđ</li>
                        <li>01 buổi tư vấn ứng dụng Thần Số Học cùng chuyên gia 500.000 vnđ</li>
                        <li><b>Tổng: 650.000 vnđ</b> </li>
                    </ul>
                    <a href="/tai-khoan/gio-hang/ca-nhan" class="btn btn-outline-secondary mb-3">Mua Ngay</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
