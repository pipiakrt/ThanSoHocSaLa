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
<div class="slogan bg-xanh-nhat text-white text-center">
    <h1>"KIẾN TẠO CUỘC ĐỜI HẠNH PHÚC TỪ NHỮNG CON SỐ"</h1>
</div>

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
        </ol>
    </div>
</nav>

<div class="container">

    <div class="row my-5">
        <div class="col-md-3 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Trần Văn Kiên</span>
            </h4>
            <x-account-menu />
        </div>
        <div class="col-md-9 order-md-1 form-111">
            <h4 class="mb-3">Thông tin</h4>

            @foreach ([1,2,3] as $item)
                <div class="card card-body my-3">
                    <div class="media text-lg-left d-flex flex-lg-row">
                        <div class="mr-2 mb-3 mb-lg-0"> <img src="https://i.imgur.com/Aj0L4Wa.jpg" width="150" height="150" alt=""> </div>
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="#" data-abc="true">Apple iPhone XR (Red, 128 GB)</a> </h6>
                            <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Phones</a></li>
                                <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li>
                            </ul>
                            <p class="mb-3">128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor | Gorilla Glass with high quality display </p>
                            <ul class="list-inline list-inline-dotted mb-0">
                                <li class="list-inline-item">All items from <a href="#" data-abc="true">Mobile point</a></li>
                                <li class="list-inline-item">Add to <a href="#" data-abc="true">wishlist</a></li>
                            </ul>
                        </div>
                        <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                            <h3 class="mb-0 font-weight-semibold">$459.99</h3>
                            <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                            <div class="text-muted">1985 reviews</div> <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Thanh toán</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
