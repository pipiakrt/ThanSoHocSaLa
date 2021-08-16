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
            <form class="needs-validation" action="/tai-khoan/cap-nhap" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Họ tên</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="birthday">Ngày sinh</label>
                        <input type="text" id="birthday" name="birthdate" class="form-control" value="{{ $user->birthdate }}" required />
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
