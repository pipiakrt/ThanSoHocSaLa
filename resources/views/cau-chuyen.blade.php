@extends('layouts.app')

@section('content')

<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Câu chuyện</a></li>
        </ol>
    </div>
</nav>

<main>

    <div class="post-slogan">
        <div class="container container-header2">
            <div class="title text-center">
                <h1>"CHUYÊN MỤC TIN TỨC CỦA CHÚNG TÔI"</h1>
                <div class="br-cs1"></div>
                <div class="br-cs2"></div>
            </div>
        </div>
    </div>

    <div class="post-main mb-0 mb-md-5">
        <div class="container container-header2">


            <x-list-post-item />
            <x-list-post-item />
            <x-list-post-item />
            <x-list-post-item />

            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</main>

@endsection
