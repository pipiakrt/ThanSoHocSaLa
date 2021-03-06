@extends('layouts.app')

@push('styles')
    <style>
        body {
            background: #eee;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@push('scripts')
    <script>
        $(".form-check-input.product").click(function() {
            location.href = "/gio-hang/trang-thai/" + $(this).data("slug");
        });
    </script>
@endpush

@section('content')

    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
            </ol>
        </div>
    </nav>

    @if (\Session::has('success'))
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-4 bg-white rounded shadow-sm">
                    <div class="alert alert-success mt-3">
                        <ul class="mb-0">
                            <li style="font-size: 23px;">{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="px-4 px-lg-0 d-none d-none d-lg-block">
        <div class="pb-5 mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <input style="margin-bottom: 13px;" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Gói</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Tặng kèm</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Giá</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light text-center">
                                            <div class="py-2 text-uppercase">Xóa</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="border-0" colspan="4"></th>
                                    </tr>
                                    @isset ($products)
                                        @foreach ($products as $item)
                                            <tr>
                                                <th class="border-0">
                                                    <input class="form-check-input product" type="checkbox" data-slug="{{ $item["slug"] }}" {{ $item["status"] == true ? "checked" : "" }}>
                                                </th>
                                                <th scope="row" class="border-0">
                                                    <div class="p-2 d-flex align-items-start">
                                                        <img style="margin-right: 10px;" src="{{ $item["image"] }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                        <div class="d-inline-block align-middle">
                                                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $item["name"] }}</a></h5>
                                                            @foreach ($item["options"]["desc2"]["items"] as $value)
                                                                <span class="d-block" style="font-size: 14px; color: #333333">{{ $value["name"] }}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="border-0 align-middle">
                                                    <ul class="p-3">
                                                        @foreach ($item["promotion"][0]["options"] as $options)
                                                            <li>{{ $options['key'] . ' - ' . $options['val'] }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td class="border-0 align-middle"><strong>{{ $item["price"] }}</strong></td>
                                                <td class="border-0 align-middle text-center"><a href="/gio-hang/xoa/{{ $item["id"] }}" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th class="border-0" colspan="4">
                                                <h3>Giỏ Hàng Trống</h3>
                                            </th>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Hóa Đơn Tạm Tính </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Chi phí vận chuyển và chi phí bổ sung được tính thêm sau khi tính phí.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-top"><strong class="text-muted">Giá</strong><strong>{{ number_format($total) }} VNĐ</strong></li>
                                <li class="d-flex justify-content-between py-3 border-top"><strong class="text-muted">Thuế</strong><strong>0.00 VNĐ</strong></li>
                                <li class="d-flex justify-content-between py-3 border-top"><strong class="text-muted">Phí Ship</strong><strong>0.00 VNĐ</strong></li>
                                <li class="d-flex justify-content-between py-3 border-top"><strong class="text-muted">Tổng</strong>
                                    <h5 class="font-weight-bold">{{ number_format($total) }} VNĐ</h5>
                                </li>
                                @if (request()->user())
                                    <li class="d-flex justify-content-between py-3 border-top"><a href="/tai-khoan/dat-hang" class="btn btn-dark rounded-pill py-2 btn-block">Tiến hành thanh toán đơn hàng</a></li>
                                @else
                                    <li class="d-flex justify-content-between py-3 border-top"><a href="/dat-hang" class="btn btn-dark rounded-pill py-2 btn-block">Tiến hành thanh toán đơn hàng</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-block d-lg-none bg-white rounded shadow-sm p-3">
        <div class="row g-0">
            @isset ($products)
                @foreach ($products as $item)
                    <div class="col-12">
                        {{-- <input class="form-check-input product" type="checkbox" data-slug="{{ $item["slug"] }}" {{ $item["status"] == true ? "checked" : "" }}> --}}

                        <div class="p-2 d-flex align-items-start">
                            <img style="margin-right: 10px;" src="{{ $item["image"] }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                            <div class="d-inline-block align-middle">
                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $item["name"] }}</a></h5>
                                @foreach ($item["options"]["desc2"]["items"] as $value)
                                    <span class="d-block" style="font-size: 14px; color: #333333">{{ $value["name"] }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="p-3">
                            @foreach ($item["promotion"][0]["options"] as $options)
                                <li>{{ $options['key'] . ' - ' . $options['val'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12 position-relative">
                        <div class="border-0 align-middle"><b>Giá: </b><strong>{{ $item["price"] }}</strong></div>
                        <div class="border-0 align-middle text-end me-1 position-absolute bottom-0" style="right: 3px;"><a href="/gio-hang/xoa/{{ $item["id"] }}" class="text-dark"><i class="fa fa-trash"></i></a></div>
                    </div>
                    <hr class="mt-3" />
                @endforeach
            @endisset

            <div class="col-lg-12">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Hóa Đơn Tạm Tính </div>
                <div class="mt-4">
                    <p class="font-italic mb-4">Chi phí vận chuyển và chi phí bổ sung được tính thêm sau khi tính phí.</p>
                    <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-top"><strong class="text-muted">Giá</strong><strong>{{ number_format($total) }} VNĐ</strong></li>
                        <li class="d-flex justify-content-between py-3 border-top"><strong class="text-muted">Thuế</strong><strong>0.00 VNĐ</strong></li>
                        <li class="d-flex justify-content-between py-3 border-top"><strong class="text-muted">Phí Ship</strong><strong>0.00 VNĐ</strong></li>
                        <li class="d-flex justify-content-between py-3 border-top"><strong class="text-muted">Tổng</strong>
                            <h5 class="font-weight-bold">{{ number_format($total) }} VNĐ</h5>
                        </li>
                        @if (request()->user())
                            <li class="d-flex justify-content-between py-3 border-top"><a href="/tai-khoan/dat-hang" class="btn btn-dark rounded-pill py-2 btn-block">Tiến hành thanh toán đơn hàng</a></li>
                        @else
                            <li class="d-flex justify-content-between py-3 border-top"><a href="/dat-hang" class="btn btn-dark rounded-pill py-2 btn-block">Tiến hành thanh toán đơn hàng</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
