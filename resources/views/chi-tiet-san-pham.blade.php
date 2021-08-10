@extends('layouts.app')


@push('styles')
    <link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
    <link rel="stylesheet" href="/css/san-pham.css">
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
        <div class="container px-0 px-lg-4 pt-5">
            <div class="row g-0 h-100">
                @foreach ($products as $key => $item)
                    @if ($key < 3)
                        <div class="col-md-4">
                            <div class="eventItem2 item {{ $key == 0 ? 'active' : '' }}" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="{{ $key }}">
                                <div class="tengoi">
                                    <h3>{{ $item->name }}</h3>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="thongtingoi">
        <div class="container px-0 px-lg-4">
            <div class="maingoi px-0 px-lg-5">
                <div id="carouselExampleCaptions2" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        @foreach ($products as $key => $item)
                            @if ($key < 3)
                                <x-product-item :item="$item" :key="$key"/>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tieudegoi">
        <div class="container px-0 px-lg-4 pt-5">
            <div class="row g-0 h-100">
                @foreach ($product_dn as $key => $item)
                    @if ($key < 3)
                        <div class="col-md-4">
                            <div class="eventItem2 item {{ $key == 0 ? 'active' : '' }}" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="{{ $key }}">
                                <div class="tengoi">
                                    <h3>{{ $item->name }}</h3>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="thongtingoi">
        <div class="container px-0 px-lg-4">
            <div class="maingoi px-0 px-lg-5">
                <div id="carouselExampleCaptions2" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        @foreach ($product_dn as $key => $item)
                            @if ($key < 3)
                                <x-product-item :item="$item" :key="$key"/>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-gia-tri />

    <x-lien-ket-tra-cuu />

</main>

@endsection
