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
        .tags{
            border: 1px solid silver;
            padding: 10px 15px;
        }
        .post-content {
            overflow: hidden;
        }
        .post-content img {
            max-width: 100%;
        }
        .post-content p {
            font-weight: 200;
        }
    </style>
@endpush

@section('content')

    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container container-header2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
                @if (request()->segment(1) == 'gioi-thieu')
                    <li class="breadcrumb-item"><a href="/gioi-thieu/" class="active">Giơi thiệu</a></li>
                @else
                    <li class="breadcrumb-item"><a href="/tin-tuc" class="active">{{ $post->type == 'post' ? 'Tin tức' : 'Hỏi đáp' }}</a></li>
                @endif
                @if ($post->Category)
                    <li class="breadcrumb-item"><a href="/tin-tuc/{{ $post->Category->slug }}" class="active">{{ $post->Category->name }}</a></li>
                @endif
                <li class="breadcrumb-item"><a href="#">{{ $post->name }}</a></li>
            </ol>
        </div>
    </nav>
    <main>
        <div class="post-slogan post-sloganDetail">
            <div class="container container-header2 mb-4">
                <div class="row g-0 g-md-5">
                    <div class="col-md-6 bg-white">

                        @foreach ($chuyenmuc as $item)
                            <fieldset class="w-100 mt-4 tags">
                                <legend><b>{{ $item->name }}</b></legend>
                                <div class="section row">
                                    <div class="col-md-12">
                                        <div style="padding: 0px; width: 100%;">
                                            <ol style="max-height: 180px; height: auto; overflow: auto; line-height: 32px;" id="queue">
                                                @foreach ($item->Posts as $tag)
                                                    <li><a style="color: {{ $tag->id == $post->id ? "#b00104" : "" }};"   href="/tin-tuc/{{$tag->slug}}">{{ $tag->name }}</a></li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        @endforeach


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
                        <x-danh-muc />
                        <div class="list-group list-group-flush border-bottom scrollarea">
                            @foreach ($posts as $item)
                                @if ($item->id != $post->id)
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

@endsection
