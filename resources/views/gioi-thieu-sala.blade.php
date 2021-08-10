
@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
    <link rel="stylesheet" href="/css/gioi-thieu-sla.css">
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
</main>

@endsection


