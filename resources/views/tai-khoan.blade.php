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

    @if (\Session::has('success'))
        <div class="alert alert-success mt-4">
            <ul class="mb-0">
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-md-3 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">{{ $user->name }}</span>
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
                <li class="list-group-item d-flex justify-content-between">
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="btn p-0" type="submit">
                            <span>Đăng xuất</span>
                        </button>
                    </form>
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
            <form class="needs-validation" action="/tai-khoan/cap-nhap" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Họ tên</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Ngày sinh</label>
                        <input type="date" name="birthdate" class="form-control" id="lastName" value="{{ $user->birthdate }}" />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Tài khoản</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" value="{{ $user->email }}" disabled />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone">Điện thoại</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}" />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <textarea class="form-control" id="address" name="address" rows="5">{{ $user->address }}</textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection
