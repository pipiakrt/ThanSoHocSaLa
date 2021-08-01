@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/post2.css">
    <link rel="stylesheet" href="/css/postDetail2.css">
    <style>
        .title-lienquan {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            overflow: hidden;
        }
        .desc-lienquan {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }
    </style>
@endpush

@section('content')

    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container container-header2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                @if (request()->segment(1) == 'gioi-thieu')
                    <li class="breadcrumb-item"><a href="/gioi-thieu/">Giơi thiệu</a></li>
                @else
                    <li class="breadcrumb-item"><a href="/tin-tuc">{{ $post->type == 'post' ? 'Tin tức' : 'Câu chuyện' }}</a></li>
                @endif
                <li class="breadcrumb-item"><a href="#">{{ $post->name }}</a></li>
            </ol>
        </div>
    </nav>
    <main>
        <div class="post-slogan post-sloganDetail">
            <div class="container container-header2">
                <div class="row g-0 g-md-5">
                    <div class="col-md-6">
                        @if ($post->type == 'story')
                            <div class="title">
                                <h1>{{ $post->author }}</h1>
                            </div>
                        @endif
                        <div class="post-content pb-0 pt-2">
                            <div class="desc-1">
                                <h3>{{ $post->name }}</h3>
                            </div>
                            <div class="desc fw-lighter mb-5">
                                <span>{{ $post->description }}</span>
                            </div>
                        </div>
                        <div class="post-content">
                            {!! $post->content !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="list-group list-group-flush border-bottom scrollarea">
                            @foreach ($posts as $item)
                                <a href="/tin-tuc/{{ $item->slug }}" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                                    <div class="row g-0">
                                        <div class="col-9">
                                            <div class="col-11">
                                                <strong class="mb-1 title-lienquan">{{ $item->name }}</strong>
                                            </div>
                                            <div class="col-11 small desc-lienquan">{{ $item->description }}</div>
                                        </div>
                                        <div class="col-3">
                                            <img style="max-width: 100px" src="{{ $item->image ? $item->image : '/img/post/1.png' }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

@endsection
