@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
    <link rel="stylesheet" href="/css/san-pham.css">
    <style>
        .thongtingoi .dot-item {
            width: 15px;
            height: 15px;
            background-color: #097364;
            border-radius: 50%;
            position: absolute;
            bottom: -7px;
            right: 0;
            left: 0;
            margin: auto;
        }

        .thongtingoi .box-item {
            background-color: #ededed;
            padding: 25px 0;
            padding-top: 100px;
            border-radius: 15px;
            height: 100%;
        }

        .thongtingoi .title-ct {
            margin-bottom: 100px;
        }

        .thongtingoi .item .image {
            border: 1px solid #03402f;
            height: fit-content !important;
            width: fit-content;
            margin: auto;
            border-radius: 50%;
            text-align: center;
            position: absolute;
            top: -100px;
            right: 0;
            left: 0;
            padding: 8px;
            background-color: white;
        }

    </style>
@endpush

@section('content')

<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
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
        <div class="container container-chuyengia px-0 px-lg-4 pt-0 pt-md-5">
            <div class="row g-0 h-100">
                @foreach ($products as $key => $item)
                    <div class="col-6 col-md-6">
                        <div class="eventItem2 item {{ $key == 0 ? 'active' : '' }}" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="{{ $key }}">
                            <div class="tengoi">
                                <h3>{{ $item->name }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="thongtingoi">
        <div class="container container-chuyengia px-0 px-lg-4">
            <div class="maingoi px-0 px-lg-5">
                <div id="carouselExampleCaptions2" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        @foreach ($products as $key => $item)
                            <x-product-item :item="$item" :key="$key"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-gia-tri />

    <div class="ketqua sanpham">
        <div class="content-ketqua">
            <div class="container container-ketqua">
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="share-ketqua text-white">
                            <div class="titlecs text-center"><h4 class="DGESGH1">nhận giải mã trực tiếp</h4></div>
                            <div class="desccs fw-lighter">
                                <div><span class="DGESGH2_1">Nếu bạn muốn biết chi tiết hơn về những lời khuyên phù hợp nhất, giải mã vận mệnh, thăng trầm và ý nghĩa từng năm. Khám phá Giải mã chi tiết chuyên sâu ngay.</span></div>
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

@endsection
