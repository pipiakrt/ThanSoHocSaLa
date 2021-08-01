@extends('layouts.app')

@push('styles')
    <style>
        .card-pricing.popular {
            z-index: 1;
            border: 3px solid #007bff;
        }
        .card-pricing .list-unstyled li {
            padding: .5rem 0;
            color: #6c757d;
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

{{-- <div class="group-bg cus-service2">

    <x-sanpham />

</div> --}}


<div class="container mb-5 mt-5">
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
</div>

@endsection
