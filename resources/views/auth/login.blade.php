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
            <li class="breadcrumb-item"><a href="#">Đăng nhập</a></li>
        </ol>
    </div>
</nav>
<div class="container mb-5 mt-4 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Đăng Nhập</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mt-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Tài khoản</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label mt-2" for="remember">
                                        Nhớ mật khẩu
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-3 mt-2">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng nhập
                                </button>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Đăng ký,
                                </a>
                                <a class="btn-link" href="{{ route('password.request') }}">
                                    Quên mật khẩu
                                </a>
                            </div>
                        </div>
                        <style>
                            .btn-google:hover {
                                color: #fbbc05;
                            }
                            .btn-google {
                                background: #f6f6f6;
                                color: #fbbc05;
                                font-weight: 200;
                                line-height: 2;
                                border-color: #fbbc05;
                            }
                            .btn-facebook:hover {
                                color: #3b5998;
                            }
                            .btn-facebook {
                                background: #f6f6f6;
                                color: #3b5998;
                                font-weight: 200;
                                line-height: 2;
                                border-color: #3b5998;
                            }
                        </style>
                        <div class="form-group row mb-3 mt-4">
                            <div class="col-md-12 offset-md-4">
                                <a href="/socialite/login/google" class="btn btn-google">
                                    <img class="me-1" src="https://upload.wikimedia.org/wikipedia/commons/2/2d/Google-favicon-2015.png" width="30">
                                    Hoạc đăng nhập Google
                                </a>
                                <a href="/socialite/login/facebook" class="btn btn-facebook">
                                    <img class="me-1" src="https://cmctourist.com.vn/wp-content/uploads/2020/09/f_logo_RGB-Hex-Blue_512.png" width="30">
                                    Hoạc đăng nhập Facebook
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
