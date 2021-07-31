@extends('layouts.app')


@push('styles')
    <link rel="stylesheet" href="/css/post.css">
@endpush

@section('content')


<div class="slogan bg-xanh-nhat text-white text-center">
    <h1>"KIẾN TẠO CUỘC ĐỜI HẠNH PHÚC TỪ NHỮNG CON SỐ"</h1>
</div>

<main>

    <div class="post-header">
        <div class="container container-header">
            <div class="row g-0">
                <div class="col-md-5">
                    <div class="d-flex justify-content-center">
                        <div>
                            <div class="header-title"><h1>Các Dịch Vụ Tại</h1></div>
                            <div class="header-title"><h1>thần số học sala</h1></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 cmt-4">
                    <div class="header-desc"><span>Thần Số Học SALA dựa trên các nghiên cứu khoa học giúp mọi người hiểu rõ bản thân </span></div>
                    <div class="header-desc"><span>từ đó định dạng được rõ ràng hướng đi cho bản thân</span></div>
                </div>
            </div>
        </div>
    </div>

    <x-dich-vu />


</main>


@endsection
