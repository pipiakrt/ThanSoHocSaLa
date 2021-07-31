@extends('layouts.app')


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
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0 mt-1">Thông tin tài khoản</h6>
                        <small>Brief description</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Giỏ hàng</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Đơn hàng</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-condensed">
                    <div>
                        <h6 class="my-0">license code</h6>
                        <small class="text-muted">1 lượt tra cứu thần số học</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Sản phẩm yêu thích</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Tải file luận giải</span>
                    <strong>$20</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nhập code" />
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Tra cứu nâng cao</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-9 order-md-1">
            <h4 class="mb-3">Thông tin</h4>
            <form class="needs-validation" novalidate="">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Họ tên</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="{{ $user->name }}" required="" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Ngày sinh</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="" />
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Tài khoản</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" value="{{ $user->email }}" disabled />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Điện thoại</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" placeholder="" required="" />
                        <div class="invalid-feedback" style="width: 100%;">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" placeholder="" required="" />
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary">Cập nhật</button>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection
