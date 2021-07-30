@extends('layouts.app')

@section('content')

<div class="container text-center">
    <h1>{{ $product->name }}</h1>
    <img src="{{$product->image}}" alt="">
    <div>
        <span>{{$product->description}}</span>
    </div>
    <div>
        <span>{!!$product->content!!}</span>
    </div>
</div>

@endsection
