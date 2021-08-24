<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @stack('head')
    <x-meta />
    <meta property="og:image" content="/img/share-social.png" />
    <meta content="INDEX,FOLLOW" name="robots" />
    <meta name="RATING" content="GENERAL" />
    <meta property="og:url" itemprop="url" content="https://thansohocsala.com/" />
    <meta http-equiv="audience" content="General" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name="revisit-after" content="1 days" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <meta property="og:site_name" content="thansohocsala.com" />
    <link rel="canonical" href="https://thansohocsala.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <title>Thần Số Học Sala</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="/plugins/bootstrap-5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/custom-bootstrap.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/ung-dung.css">
    <link rel="stylesheet" href="/css/main.css">
    @stack('styles')
    <link rel="stylesheet" href="/css/reponsive-desktop.css">
    <link rel="stylesheet" href="/css/reponsive-mobile.css">
    <link rel="stylesheet" href="/plugins/owl-carousel/dist/assets/owl.carousel.min.css">

</head>
<body>

    <x-header/>

    <main>

        @yield('content')

        <x-footer/>

    </main>

    <!-- Scripts -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    {{-- <script src="/plugins/bootstrap-5/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/plugins/owl-carousel/dist/owl.carousel.js"></script>
    <script src="/plugins/particles/js/app.js"></script>
    <script src="/plugins/particles/js/particles.js"></script>
    @stack('scripts')
    <script src="/js/main.js"></script>

    <x-script />

</body>
</html>
