@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/plugins/dtsel-master/dtsel.css">
@endpush

@push('scripts')
    <script src="/plugins/dtsel-master/dtsel.js"></script>
    <script>
        $('#birthday').datepicker({
            format: 'dd-mm-yyyy'
        });
    </script>
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
            <li class="breadcrumb-item"><a href="#">Đăng ký</a></li>
        </ol>
    </div>
</nav>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Đăng Ký Tài Khoản</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row mt-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Họ Tên</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">Ngày sinh</label>
                            <div class="col-md-6">
                                <input id="birthday" name="birthdate" value="{{ old('birthdate') }}" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Điện thoại</label>
                            <div class="col-md-6">
                                <input id="phone" name="phone" value="{{ old('phone') }}" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-4 d-none">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Đỉa chỉ</label>
                            <div class="col-md-6">
                                <textarea class="w-100 form-control" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mt-4 mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng Ký
                                </button>
                                <div class="mt-2">
                                    <span>Nếu bạn đã có tài khoản?</span>
                                    <a class="btn-link" href="{{ route('login') }}">
                                        Đăng Nhập,
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
