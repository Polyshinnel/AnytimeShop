<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/js/splide/css/splide-core.min.css">
    <link rel="stylesheet" href="/assets/js/fancybox/fancybox.css">
    <script src="/assets/js/fancybox/fancybox.umd.js"></script>
    <script src="/assets/js/splide/js/splide.min.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css?ver=1231541">
    <title>@yield('page_title')</title>
</head>
<body>
    @include('Components.Header')
    <main>
        @yield('content')
    </main>
    @include('Components.Footer')
    <script src="https://yastatic.net/share2/share.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/assets/js/inputmask.min.js"></script>
    <script src="/assets/js/main.js?ver=1231541"></script>
</body>
</html>
