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

        .fa {
            color: red
        }

        .chips {
            border-radius: 7px;
            padding-top: 7px;
            padding-bottom: 3px;
        }

        .price--cus {
            font-size: 30px;
            color: #388a6b !important;
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
                <h4 class="mb-3">Đơn hàng</h4>
                @if (request()->segment(2) == 'don-hang')
                    <div class="alert alert-secondary" role="alert">
                        <div class="row g-0">
                            <div class="col-md-11">Chi tiết quy trình mua hàng, hình thức thanh toán của Thần Số Học Sala</div>
                            <div class="col-md-1">
                                <a href="/hoi-dap/huong-dan-cach-mua-hang-tren-thansohocsalacom" class="link-secondary decoration-revert">Xem bài viết</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-secondary" role="alert">
                        <div class="row g-0">
                            <div class="col-md-11">Xem Chi tiết các điều khoản dịch vụ thần số học sala</div>
                            <div class="col-md-1">
                                <a href="/hoi-dap/huong-dan-cach-mua-hang-tren-thansohocsalacom" class="link-secondary decoration-revert">Xem bài viết</a>
                            </div>
                        </div>
                    </div>
                @endif
                @forelse ($orders as $item)
                    <div class="card card-body my-3">
                        <div class="media text-lg-left row g-0 g-md-4">
                            <div class="col-md-3 col-lg-2 text-center">
                                <div class="mr-2 mb-3 mb-lg-0"> <img class="mw-100" src="{{ $item->Product ? $item->Product->image : '/img/kh/1.jpg' }}" alt=""> </div>
                            </div>
                            <div class="col-md-6 col-lg-8">
                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold"> Mã đơn hàng: #<a href="#" data-abc="true">{{ $item->code }}</a> </h6>
                                    <h6 class="media-title font-weight-semibold"> <a href="#" data-abc="true">{{ $item->Product->name }}</a> </h6>
                                    <h6 class="media-title font-weight-semibold"> Ngày đặt hàng: <a href="#" data-abc="true">{{ $item->created_at }}</a> </h6>
                                    <h6 class="media-title font-weight-semibold"> Loại hình đặt hàng: <a href="#" data-abc="true">{{ $item->payment }}</a> </h6>
                                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                        @if ($item->status == 1)
                                            <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Bàn còn {{ request()->user()->License->number }} lượt tra cứu</a></li>
                                        @else
                                            <li class="list-inline-item"><a href="#" class="text-muted price--cus" data-abc="true">Giá {{ $item->Product->price }}</a></li>
                                        @endif
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
                                    @if (in_array($item->status, [0, 1]))
                                        <h6 class="mb-0 mt-2 bg-primary text-white chips">Chưa thanh toán</h6>
                                        <a href="tel:0942384382">
                                            <h6 class="mb-0 mt-2 bg-danger text-white chips">Gọi Hotline</h6>
                                        </a>
                                        @if ($item->status == 0)
                                            <h6 class="mb-0 mt-2 bg-danger text-white chips" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->code }}">Hủy đơn</h6>
                                        @endif
                                    @elseif ($item->status == 2)
                                        <h6 class="mb-0 mt-2 bg-success text-white chips">Kích Hoạt</h6>
                                    @elseif ($item->status == 3)
                                        <h6 class="mb-0 mt-2 bg-danger text-white chips">Hết hạn</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="/tai-khoan/don-hang/{{ $item->code }}/huy-don">
                        @method("DELETE")
                        <div class="modal" id="exampleModal-{{ $item->code }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hủy đơn hàng?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body py-4">
                                        <label for="note" class="col-form-label">bạn hãy cho tối biết lý do hủy</label>
                                        <select name="type" class="form-select" required>
                                            <option value="">Chọn lý do hủy</option>
                                            <option value="Đặt trùng">Đặt trùng</option>
                                            <option value="Không còn nhu cầu">Không còn nhu cầu</option>
                                            <option value="Thêm/bớt sản phẩm">Thêm/bớt sản phẩm</option>
                                            <option value="Muốn đặt lại trên Tiki App">Muốn đặt lại trên Tiki App</option>
                                            <option value="Đổi hình thức thanh toán">Đổi hình thức thanh toán</option>
                                            <option value="Thay đổi địa chỉ giao hàng">Thay đổi địa chỉ giao hàng</option>
                                            <option value="Thời gian giao hàng quá lâu/sớm">Thời gian giao hàng quá lâu/sớm</option>
                                            <option value="Khác">Khác</option>
                                        </select>
                                        <label for="note" class="col-form-label mt-2">Ghi chú</label>
                                        <input type="note" name="lydohuy" class="form-control" id="note" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary">Hủy đơn</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @empty

                    <div class="card card-body my-3">
                        <div class="media text-lg-left">
                            <h4 class="text-secondary">Chưa có gói sản phẩm!</h4>
                        </div>
                    </div>

                @endforelse
            </div>
        </div>
    </div>

@endsection
