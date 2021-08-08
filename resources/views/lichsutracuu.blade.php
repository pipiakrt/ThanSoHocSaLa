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
        .chips {
            border-radius: 7px;
            padding-top: 7px;
            padding-bottom: 3px;
        }
        .lh-2 {
            line-height: 2;
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
    @if (\Session::has('msg'))
        <div class="alert alert-success mt-4">
            <ul class="mb-0">
                <li>{!! \Session::get('msg') !!}</li>
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-md-3 mb-4">
            <x-account-menu />
        </div>
        <div class="col-md-9 order-md-1 form-111">
            <h4 class="mb-3">Lịch sử</h4>

            <div class="card card-body py-2">
                <div class="media text-lg-left row g-0 g-md-4">
                    <div class="col-md-12 col-lg-12">
                        <div class="media-body">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <h6 class="mb-0 media-title font-weight-semibold lh-2"> <span>ID</span> </h6>
                                </div>
                                <div class="col-md-2">
                                    <h6 class="mb-0 media-title font-weight-semibold lh-2"> <span>Họ Tên</span> </h6>
                                </div>
                                <div class="col-md-3 text-start text-md-center">
                                    <h6 class="mb-0 media-title font-weight-semibold lh-2"> <span>Ngày Sinh</span> </h6>
                                </div>
                                <div class="col-md-4 text-start text-md-center">
                                    <h6 class="mb-0 media-title font-weight-semibold lh-2"> <span>Thời Gian Tra Cứu</span> </h6>
                                </div>
                                <div class="col-md-1">
                                    <h6 class="mb-0 media-title font-weight-semibold bg-success text-center py-1 px-2"> <a href="#" class="link-primary text-white">Export</a> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @forelse (request()->user()->TraCuu as $key => $item)
                <div class="card card-body my-3">
                    <div class="media text-lg-left row g-0 g-md-4">
                        <div class="col-md-12 col-lg-12">
                            <div class="media-body">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <h6 class="media-title font-weight-semibold"> <span>#{{ $item->created_at->getTimestamp() }}</span> </h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6 class="media-title font-weight-semibold"> <span>{{ $item->name }}</span> </h6>
                                    </div>
                                    <div class="col-md-3 text-start text-md-center">
                                        <h6 class="media-title font-weight-semibold"> <span>{{ $item->birthdate }}</span> </h6>
                                    </div>
                                    <div class="col-md-4 text-start text-md-center">
                                        <h6 class="media-title font-weight-semibold"> <span>{{ $item->created_at }}</span> </h6>
                                    </div>
                                    <div class="col-md-1">
                                        <h6 class="media-title font-weight-semibold bg-success text-center py-1 px-2"> <a href="/tai-khoan/lich-su-tra-cuu/{{ $item->code }}?type=preview" target="_blank" class="link-primary text-white decoration-revert">Xem Lại</a> </h6>
                                        <h6 class="media-title font-weight-semibold bg-success text-center py-1 px-2"> <a href="/tai-khoan/lich-su-tra-cuu/{{ $item->code }}?type=download" class="link-primary text-white decoration-revert">Tải Về</a> </h6>
                                        <h6 class="media-title font-weight-semibold bg-success text-center py-1 px-2"> <a href="/tai-khoan/lich-su-tra-cuu/{{ $item->code }}?type=sendmail" class="link-primary text-white decoration-revert">Gửi Mail</a> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            <div class="card card-body my-3">
                <div class="media text-lg-left">
                    <h4 class="text-secondary">Lịch sử trống!</h4>
                </div>
            </div>

            @endforelse
        </div>
    </div>
</div>

@endsection
