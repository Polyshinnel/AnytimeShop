<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/img/favicon.svg?ver=123" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/js/splide/css/splide-core.min.css">
    <link rel="stylesheet" href="/assets/js/fancybox/fancybox.css">
    <script src="https://yastatic.net/share2/share.js" async></script>
    <link rel="stylesheet" href="/assets/css/style.min.css?ver=2341523">

    <link rel="canonical" href="@yield('canonical')">
    <meta property="description" content="@yield('description')">
    <meta name="description" content="@yield('description')">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('page_title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('og_image')">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <title>@yield('page_title')</title>
</head>
<body>
    @include('Components.HomeHeader')
    <main>
        @yield('content')
    </main>
    @include('Components.Footer')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="/assets/js/fancybox/fancybox.umd.js"></script>
    <script src="/assets/js/inputmask.min.js"></script>
    <script src="/assets/js/main.js?ver=35123"></script>

    @yield('scripts')

    <!-- Yandex.Metrika counter -->
    <script>
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(99227364, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/99227364" style="position:absolute; left:-9999px;" alt="" ></div></noscript>
    <!-- /Yandex.Metrika counter -->
</body>
</html>
