<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="theme-color" content="#234556">
    <meta http-equiv="Content-Language" content="vi" />
    <meta content="VN" name="geo.region" />
    <meta name="DC.language" scheme="utf-8" content="vi" />
    <meta name="language" content="Việt Nam">


    <link rel="shortcut icon"
        href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png"
        type="image/x-icon" />
    <meta name="revisit-after" content="1 days" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>@yield('title')</title>
    <meta name="description"
        content="Phim hay 2021 - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh" />
    <link rel="canonical" href="">
    <link rel="next" href="" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="Phim hay 2020 - Xem phim hay nhất" />
    <meta property="og:description"
        content="Phim hay 2020 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="Phim hay 2021- Xem phim hay nhất" />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="55" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel='stylesheet' id='bootstrap-css' href="{{ asset('css/bootstrap.min.css?ver=5.7.2') }}" media=' all' />
    <link rel='stylesheet' id='style-css' href="{{ asset('css/style.css?ver=5.7.2') }}" media=' all' />
    <link rel='stylesheet' id='wp-block-library-css' href="{{ asset('css/style.min.css?ver=5.7.2') }}" media=' all' />
    <script type='text/javascript' src="{{ asset('js/jquery.min.js?ver=5.7.2') }}" id=' halim-jquery-js'></script>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="home blog halimthemes halimmovies" data-masonry="">

    @include('layouts.inc.user-header')
    @include('layouts.inc.user-nav')
    <div class="container">
        @yield('content')
    </div>
    @include('layouts.inc.user-footer')
    @include('layouts.inc.user-easy-top')

    <script type='text/javascript' src='{{ asset('js/bootstrap.min.js?ver=5.7.2') }}' id='bootstrap-js'></script>
    <script type='text/javascript' src='{{ asset('js/owl.carousel.min.js?ver=5.7.2') }}' id='carousel-js'></script>
    <script type='text/javascript' src='{{ asset('js/halimtheme-core.min.js?ver=1626273138') }}' id='halim-init-js'>
    </script>
    <link rel="stylesheet" href="{{ asset('css/config.css') }}">
    @yield('js')

</body>

</html>
