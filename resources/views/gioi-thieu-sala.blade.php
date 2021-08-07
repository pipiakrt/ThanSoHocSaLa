
@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
@endpush

<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Giới thiệu về sala</a></li>
        </ol>
    </div>
</nav>

<main>
    <div class="sliders cts position-relative">
        <div id="sliders" class="owl-carousel owl-theme">
            <div class="item">
                <img class="header-logo" alt="Thần Số Học" src="/img/gioithieu/t1.png">
            </div>
            <div class="item">
                <img class="header-logo" alt="Thần Số Học" src="/img/gioithieu/t1.png">
            </div>
        </div>
        <div class="slider-logo text-center position-absolute">
            <img src="/img/gioithieu/b3.png" alt="">
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
            padding-bottom: 200px !important;
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
    </style>

    <div class="main-cauchuyen py-5">
        <div class="main-1">
            <div class="container my-5 py-5 pb-0 pb-md-5 mb-0 mb-md-5">
                <div class="row justify-content-center g-0 my-4">
                    <div class="col-sm-12 col-md-10 col-lg-7">
                        <img class="mw-100" src="/img/gioithieu/t2.png" alt="">
                        <div class="descs1">
                            <span>Thần Số Học - Numerology (tên tiếng Anh của Thần Số Học) dựa vào việc nghiên cứu ý nghĩa của các sóng rung và trường năng lượng của vũ trụ để tạo ra các con số và ảnh hưởng của nó tới cuộc sống con người.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bn-main position-relative my-5 mb-0 mb-md-5">
            <div class="bg-cangiua position-absolute">
                <img class="mw-100" src="/img/gioithieu/sach.png" alt="">
            </div>
            <img class="w-100" src="/img/gioithieu/t3.png" alt="">
        </div>
    </div>
    <div class="ketqua sanpham ct">
        <div class="container py-2">
            <div class="row justify-content-center g-0">
                <div class="col-sm-12 col-md-10 col-lg-7">
                    <div class="descs1">
                        <span>Từ xa xưa, con người đã biết ứng dụng Thần Số Học vào cuộc sống để thấu hiểu bản thân và tìm ra con đường tốt nhất cho chính mình. Ngày nay Thần Số Học được áp dụng rộng rãi tại các nước phương Tây và vài năm gần đây, bộ môn này bắt đầu được tiếp nhận tại đất nước Việt Nam</span>
                    </div>
                    <div class="descs1 mt-2">
                        <span>Thần Số Học là KHOA HỌC, chúng giúp bạn tìm ra con đường NGẮN NHẤT đi đến ĐỈNH CAO của sự nghiệp, tìm ra được công việc phù hợp và những thứ xã hội cần mà bạn có thể làm tốt nhất.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-ketqua">
            <div class="container container-ketqua">
                <div class="bd-img">
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


