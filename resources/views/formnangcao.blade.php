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

    @if (\Session::has('error'))
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-md-3 mb-4">
            <x-account-menu />
        </div>
        <div class="col-md-9 order-md-1">
            <h4 class="mb-3">Thông tin</h4>
            <form class="needs-validation" action="/tai-khoan/tra-cuu-nang-cao" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Họ tên</label>
                        <input type="text" name="name" class="form-control" id="name" required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Ngày sinh</label>
                        <input type="date" name="birthday" class="form-control" id="lastName" required />
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Tra Cứu</button>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection
