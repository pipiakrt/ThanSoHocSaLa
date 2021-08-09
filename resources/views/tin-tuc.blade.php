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
                @isset($category)
                    <li class="breadcrumb-item"><a href="#">{{ $category->name }}</a></li>
                @endisset
            </ol>
        </div>
    </nav>

    <main>

        <div class="post-slogan">
            <div class="container container-header2">
                <div class="title text-center mt-2 mb-4">
                    <h1>TIN TỨC</h1>
                    <div class="br-cs1"></div>
                    <div class="br-cs2"></div>
                </div>
            </div>
        </div>

        <div class="post-main mb-0 mb-md-5">
            <div class="container container-header2">
                <div class="row g-0 g-md-5">
                    <div class="col-md-3">
                        <x-danh-muc />
                    </div>
                    <div class="col-md-9">
                        @foreach ($posts as $item)
                            <div class="post-item mb-5">
                                <div class="row g-0 g-md-3">
                                    <div class="col-md-4">
                                        <div class="image">
                                            <img class="mw-100" src="{{ $item->image ? $item->image : '/img/post/1.png' }}" alt="{{ $item->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <div class="post-preview mt-4 mt-md-0">
                                            <div class="post-name">
                                                <h2>{{ $item->name }}</h2>
                                            </div>
                                            <div class="post-desc"><span>{{ $item->description }}</span></div>
                                            <div class="submit-post">
                                                <a href="/tin-tuc/{{ $item->slug }}">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
