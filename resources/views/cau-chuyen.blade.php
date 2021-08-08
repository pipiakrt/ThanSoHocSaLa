@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/post2.css">
@endpush

@section('content')

    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container container-header2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Câu Chuyện</a></li>
            </ol>
        </div>
    </nav>

    <main>

        <x-khach-hang-phan-hoi />

    </main>

@endsection
