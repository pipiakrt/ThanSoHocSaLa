@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/post2.css">
    <link rel="stylesheet" href="/css/postDetail2.css">
@endpush

@section('content')


<div class="slogan bg-xanh-nhat text-white text-center">
    <h1>"KIẾN TẠO CUỘC ĐỜI HẠNH PHÚC TỪ NHỮNG CON SỐ"</h1>
</div>

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $post->type == 'post' ? 'Tin tức' : 'Câu chuyện' }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $post->name }}</a></li>
        </ol>
    </div>
</nav>
<main>
    <div class="post-slogan post-sloganDetail">
        <div class="container container-header2">
            <div class="title text-center">
                <h1>{{ $post->author }}</h1>
                <div class="br-cs1"></div>
                <div class="br-cs2"></div>
            </div>
            <div class="post-content pb-0 pt-2">
                <div class="desc-1 text-center">
                    <h3>{{ $post->name }}</h3>
                </div>
                <div class="desc text-center fw-lighter mb-5">
                    <span>{{ $post->description }}</span>
                </div>
            </div>
        </div>
        <hr>
        <div class="container container-header2">
            <div class="post-content">
                {!! $post->content !!}
            </div>
        </div>

        <x-tintuclienquan />

    </div>

</main>

@endsection
