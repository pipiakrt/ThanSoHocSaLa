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
        .form-111 {
            font-size: .8125rem;
            font-weight: 400;
            line-height: 1.5385;
            color: #333;
            text-align: left;
        }

        .mt-50 {
            margin-top: 50px
        }

        .mb-50 {
            margin-bottom: 50px
        }

        .bg-teal-400 {
            background-color: #26a69a
        }

        a {
            text-decoration: none !important
        }

        .fa {
            color: red
        }
    </style>
@endpush

@section('content')
<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
        </ol>
    </div>
</nav>

<div class="container">

    <div class="row my-5">
        <div class="col-md-3 mb-4">
            <x-account-menu />
        </div>
        <div class="col-md-9 order-md-1 form-111">
            <h4 class="mb-3">Giỏ hàng</h4>

            @foreach ($carts as $item)
                <div class="card card-body my-3">
                    <div class="media text-lg-left row g-0 g-md-4">
                        <div class="col-md-3 col-lg-2 text-center">
                            <div class="mr-2 mb-3 mb-lg-0"> <img class="mw-100" src="{{ $item->Product->image ? $item->Product->image : '/img/kh/1.jpg' }}" alt=""> </div>
                        </div>
                        <div class="col-md-6 col-lg-8">
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold"> <a href="#" data-abc="true">{{ $item->Product->name }}</a> </h6>
                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Giá {{ $item->Product->price }}</a></li>
                                </ul>
                                <p class="mb-3">{{ $item->Product->description }}</p>
                                @foreach ($item->Product->promotion[0]['options'] as $options)
                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item">{{ $options['key'] . ' - ' . $options['val'] }}</li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <h3 class="mb-0 mt-2 font-weight-semibold">{{ $item->Product->price }}</h3>
                                <div class="text-muted">121 đánh giá</div>
                                <a href="/tai-khoan/gio-hang/{{ $item->id }}/dat-hang" class="btn btn-warning mt-2 text-white"><i class="icon-cart-add mr-2"></i> Thanh toán</a>
                                <a href="/tai-khoan/gio-hang/{{ $item->id }}/xoa" class="btn btn-outline-danger mt-2"><i class="icon-cart-add mr-2"></i> Loại bỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
