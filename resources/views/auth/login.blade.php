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
                                    Quyên mật khẩu
                                </a>
                            </div>
                        </div>
                        <div class="form-group row mb-3 mt-4">
                            <div class="col-md-12 offset-md-4">
                                <a href="/socialite/login/google" class="btn text-white btn-warning">
                                    Đăng nhập Google
                                </a>
                                <a href="/socialite/login/facebook" class="btn btn-primary">
                                    Đăng nhập Facebook
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
