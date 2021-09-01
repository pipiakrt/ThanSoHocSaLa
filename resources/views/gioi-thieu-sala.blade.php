
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
            <li class="breadcrumb-item"><a href="#">Thần Số Học</a></li>
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
        <div class="d-none d-md-block">
            <div class="slider-logo text-center position-absolute">
                <img src="/img/gioithieu/b3.png" alt="">
            </div>
        </div>
    </div>
    <div class="main-cauchuyen pt-0 pt-md-5 py-5">
        <div class="main-1">
            <div class="container my-5 mt-0 mt-md-5 py-5 pb-0 pb-md-5 mb-0 mb-md-5">
                <div class="row justify-content-center g-0 my-4">
                    <div class="col-sm-12 col-md-10 col-lg-7">
                        <img class="mw-100" src="/img/gioithieu/t2.png" alt="">
                        <div class="descs1">
                            <span>Thần Số Học (Numerology) là một hệ thống cổ xưa đã được sử dụng hàng ngàn năm, trải dài trên toàn cầu. Các ghi chép số học đã được tìm thấy ở Babylon và Ai Cập, và có bằng chứng sự tồn tại của nó cách đây hàng nghìn năm ở Hy Lạp, La Mã, Nhật Bản và Trung Quốc.</span>
                        </div>
                        <div class="descs1 mt-3">
                            <span>Người Chaldean hay được gọi là người Babylon đã nghiên cứu sâu về cả chiêm tinh học, số học và thực sự là những người đầu tiên xác định mối tương quan giữa các con số với dao động của vũ trụ nên còn được gọi là Chaldean Numerology. Qua nhiều thời đại, số học đã phát triển và được biết đến với tên tuổi của ông Pythagoras.</span>
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
                        <span>Vào đầu những năm 1900, tiến sĩ Julian Stenton đã ghi lại các yếu tố khác nhau của số học và phổ biến nó, đặt ra thuật ngữ "Numerology". Từ những năm 1970 số học đã được mọi người ở mọi tầng lớp xã hội sử dụng như một công cụ tự trợ giúp được cá nhân hóa. "Các con số không nói dối" là một tuyên bố sâu sắc của các nhà nghiên cứu, khẳng định con số biểu lộ tính cách và các sự kiện mà con người trải qua với độ chính xác đáng kinh ngạc.</span>
                    </div>
                    <div class="descs1 mt-2">
                        <span>Ngày nay, Numerology được thực hành trên khắp thế giới và được hàng triệu người sử dụng để giúp cho cuộc sống trở nên tốt đẹp hơn.</span>
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


