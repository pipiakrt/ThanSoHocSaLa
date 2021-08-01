@extends('layouts.app')

@section('content')

<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/san-pham/">Sản Phẩm</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $product->name }}</a></li>
        </ol>
    </div>
</nav>
<div class="container text-center py-5">
    <h1>{{ $product->name }}</h1>
    <img src="{{$product->image}}" alt="">
    <div>
        <span>{{$product->description}}</span>
    </div>
    @foreach ($product->promotion[0]['options'] as $options)
        <ul class="list-inline list-inline-dotted mb-0">
            <li class="list-inline-item">{{ $options['key'] . ' - ' . $options['val'] }}</li>
        </ul>
    @endforeach
    <div>
        <span>{!!$product->content!!}</span>
    </div>
    <a href="/tai-khoan/gio-hang/{{ $product->slug }}" class="btn btn-warning text-white">Mua Ngay</a>
</div>

@endsection
