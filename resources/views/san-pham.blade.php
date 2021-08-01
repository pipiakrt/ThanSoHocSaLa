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
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15">$<span class="price">3</span><span class="h6 text-muted ml-2">/ per month</span></h1>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">
                        <li>Up to 5 users</li>
                        <li>Basic support on Github</li>
                        <li>Monthly updates</li>
                        <li>Free cancelation</li>
                    </ul>
                    <button type="button" class="btn btn-outline-secondary mb-3">Mua Ngay</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-pricing popular shadow text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Gia Đình</span>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="30">$<span class="price">6</span><span class="h6 text-muted ml-2">/ per month</span></h1>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">
                        <li>Up to 5 users</li>
                        <li>Basic support on Github</li>
                        <li>Monthly updates</li>
                        <li>Free cancelation</li>
                    </ul>
                    <a href="https://www.totoprayogo.com" target="_blank" class="btn btn-primary mb-3">Mua Ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-pricing text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Doanh Nghiệp</span>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="45">$<span class="price">9</span><span class="h6 text-muted ml-2">/ per month</span></h1>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">
                        <li>Up to 5 users</li>
                        <li>Basic support on Github</li>
                        <li>Monthly updates</li>
                        <li>Free cancelation</li>
                    </ul>
                    <button type="button" class="btn btn-outline-secondary mb-3">Mua Ngay</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
