@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/post2.css">
@endpush

@section('content')

    <x-slogan />

    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container container-header2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ isset($category) ? '/tin-tuc' : '#' }}" class="{{ isset($category) ? 'active' : '' }}">Tin tức</a>
                </li>
            </ol>
        </div>
    </nav>

    <main>

        <div class="post-slogan">
            <div class="container container-header2">
                <div class="title text-center mb-0 mt-2 mb-md-4">
                    @isset($category)
                        <h1 style="border-bottom: 1px solid; padding-bottom: 5px; padding-top: 5px;">{{ $category->name }}</h1>
                    @else
                        <h1>TIN TỨC</h1>
                        <div class="br-cs1"></div>
                        <div class="br-cs2"></div>
                    @endisset
                </div>
            </div>
        </div>

        <div class="post-main mb-0 mb-md-5">
            <div class="container container-header2">
                <div class="row g-0 g-md-5">
                    <div class="col-lg-3">
                        <x-danh-muc />
                    </div>
                    <div class="col-lg-9">
                        @foreach ($posts as $item)
                            <x-post-item :item="$item" />
                        @endforeach

                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
