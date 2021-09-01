@extends('layouts.app')

@push('head')
    <title>{{ $user["name"] }} - {{ $user["birthdate"] }}</title>
@endpush

@push('styles')
    <link href="/css/dflip.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/themify-icons.min.css" rel="stylesheet" type="text/css" />
    <style>
        .header-mobile {
            display: none !important;
        }
        header.d-lg-block {
            display: none !important;
        }
        header {
            display: none !important;
        }
        section.linkAnnotation a, a.linkAnnotation, a.customLinkAnnotation, .customHtmlAnnotation, .customVideoAnnotation {
            background-color: unset;
        }
        footer {
            display: none !important;
        }
        .df-floating .df-ui-controls {
            top: -52px;
            right: -8%;
            left: unset;
        }
        #flipbookPDFContainer {
            overflow: unset !important;
        }
        .df-ui-more .more-container, .df-ui-search .search-container {
            top: 110%;
            bottom: unset !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="/js/dflip.min.js" type="text/javascript"></script>
    <script>
        $("#flipbookPDFContainer").flipBook(
            "/tai-khoan/lich-su-tra-cuu/{{ $id }}",
            {
                webgl: true,
            }
        );
    </script>
@endpush

@section('content')

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/tai-khoan/tra-cuu-nang-cao" class="active">Tra cứu nâng cao</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $user["name"] }} ({{ $user["birthdate"] }})</a></li>
        </ol>
    </div>
</nav>

<div id="flipbookPDFContainer"></div>


@endsection
