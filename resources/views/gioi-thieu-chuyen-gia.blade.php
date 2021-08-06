
@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
@endpush

<x-slogan />


<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
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
    <style>
        .slider-logo {
            left: 0;
            right: 0;
            z-index: 1;
            bottom: -180px;
            background-color: #05574b;
            width: 370px;
            margin: auto;
            border-radius: 50%;
            height: 370px;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 100%;
        }
        .main-cauchuyen {
            background-color: #05574b;
        }
        .main-cauchuyen .main-1 {
            /* padding-bottom: 200px !important; */
            background-image: url("/img/gioithieu/bg-1.png");
            background-repeat: no-repeat;
            background-position-y: bottom;
            background-position-x: right;
        }
        .descs1 {
            padding: 0 24px;
            font-weight: 100;
            font-size: 23px;
            color: #e6dcd5;
            line-height: 28px;
        }
        .bg-cangiua {
            left: 0;
            right: 0;
            margin: auto;
            width: fit-content;
            top: -190px;
        }
        .bd-img {
            margin-top: 50px;
            text-align: center;
        }
        .main-1 ul {
            padding: 0;
            list-style: none;
            padding: none;
        }
        .main-1 ul li {
            margin: 10px 0;
            font-size: 19px;
            font-weight: 200;
            display: flex;
        }
        .main-1 ul li span {
            margin-left: 13px;
        }
        .main-1 ul li::before {
            content: "\2022";
            color: #749e7e;
            font-weight: bold;
            display: inline-block;
            width: 1.5em;
        }
        .descs1.px-0 {
            color: #c0e2ca !important;
            margin-left: 10px;
            font-size: 22px;
        }
        .bia {
            background-color: #03402f;
        }
    </style>

    <div class="bia text-center">
        <img class="mw-100" src="/img/gioithieu/sach1.png" alt="">
    </div>

    <div class="main-cauchuyen py-5">
        <div class="main-1">
            <div class="container">
                <div class="row justify-content-center g-0 my-4">
                    <div class="col-sm-12 col-md-10 col-lg-7">
                        <div class="descs1 px-0">
                            <span>Xin chào tôi là Nguyên Hồng</span>
                        </div>
                        <div class="descs1 px-0">
                            <span>Với nhiều năm nghiên cứu khả năng tiềm ẩn và năng lực bẩm sinh của con người tại “Viện Nghiên Cứu Và Ứng Dụng Tiềm Năng Con Người” tôi nhận thấy khả năng khai phá và phát triển những tiềm ẩn bẩm sinh ở thần số học đối với con người là vô cùng lớn, đáp ứng được nguyện vọng mang lại giá trị cho cộng đồng và xã hội</span>
                        </div>
                        <div class="descs1 px-0">
                            <span>Nhận thấy được lợi ích từ việc ứng dụng Thần Số Học vào cuộc đời mỗi người nên tôi đã giành riêng 5 năm để nghiên cứu và ứng dụng thực tế môn khoa học cổ này vào cuộc sống, khoảng thời gian đó, tôi đã có cơ duyên gặp gỡ, giúp đỡ và tham vấn cho:</span>
                        </div>
                        <div class="descs1 px-0">
                            <ul class="mt-4">
                                <li>
                                    <span>Trên 2000 cá nhân thấu hiểu và phát triển bản thân. Giúp họ xác định được nghề nghiệp, hướng đi và mục tiêu trên con đường sự nghiệp.</span>
                                </li>
                                <li>
                                    <span>Trên 300 gia đình yêu thương, gắn kết với nhau. Giúp cha mẹ hiểu con cái mình hơn và làm cách nào để định hướng đường đời cho con mình một cách đúng đắn</span>
                                </li>
                                <li>
                                    <span>Trên 50 doanh nghiệp tại Hà Nội và các tỉnh phía Bắc định hình được hướng đi, thấu hiểu và điều phối nhân sự hợp lý để phát triển khả năng của nhân viên, từ đó hình thành sự phát triển của doanh nghiệp.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="descs1 px-0">
                            <span>Với mong muốn mang lại và cho đi những giá trị hữu ích và thiết thực giúp mọi người có thể sớm phát triển bản thân để đạt được đỉnh cao hạnh phúc, thành công và hướng tới sự an lạc sớm hơn tôi và HỌC VIỆN CỔ HỌC SALA đã hợp tác để cùng nhau lan tỏa những thông điệp tốt đẹp và truyền bá môn học này một cách rộng rãi và giúp cho mỗi cá nhân đều có thể tự làm chủ cuộc đời mình và đem lại nhiều lợi ích tốt đẹp cho cộng đồng.</span>
                        </div>
                        <div style="width: fit-content;" class="descs1 mx-auto px-0 my-5">
                            <img class="mw-100" src="/img/gioithieu/tuhao.png" alt="">
                        </div>

                        <iframe class="w-100 mt-4 youtube-responsive" height="450" src="https://www.youtube.com/embed/rwEfiiqJJK8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                <div><span>Nếu bạn muốn biết chi tiết hơn về những lời khuyên phù hợp nhất, giải mã vận mệnh, thăng trầm và ý nghĩa từng năm. Khám phá Giải mã chi tiết chuyên sâu ngay.</span></div>
                            </div>
                            <div class="btn-ketqua text-center">
                                <button>TRA CỨU CHUYÊN SÂU</button>
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

    <style>
        .sanpham.ct {
            background-color: #05574b;
            min-height: unset;
            padding: unset;
            background-image: unset;
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
    </style>

</main>

@endsection


