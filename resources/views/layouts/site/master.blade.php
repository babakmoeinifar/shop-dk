<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Babak Moeinifar - بابک معینی فر - babakus7@gmail.com - instagram@babakmoeini">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>دیجی کالا</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    @yield('styles')

</head>
<body id="body">
<div id="app">
    @include('layouts.site.header')

    @yield('content')

    @include('layouts.site.footer')

</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
<script src="{{ asset('js/jquery.carouFredSel-6.2.1.js') }}"></script>
{{--<script src="/js/jquery.mobile-1.4.5.min.js"></script>--}}
{{--<script src="/js/jquery.isotope.min.js"></script>--}}
{{--<script src="/js/vue_isotope.js"></script>--}}

{{--<script src="/js/jquery_ui.js"></script>--}}
{{--<script src="/js/bootstrap-slider.min.js"></script>--}}
{{--<script src="/js/jquery.slides.min.js"></script>--}}
{{--<script src="/js/sort.js"></script>--}}
<script>
    $('#zoom_01').elevateZoom({
        lensSize: 100
    });
    $(document).ready(function () {

        $("#header-shop").click(function () {
            $("#header-cart-dropdown").toggle();
        });

        $(".closebtn").click(function () {
            $(".sidenav").hide();
            $(".dark").hide();
        });

        $(".openNav").click(function () {
            $(".sidenav").show();
            $(".dark").show();
        });

        $(".dark").click(function () {
            $(".sidenav").hide();
            $(".dark").hide();
        });
    });


    $('#foo2,#foo9,#foo10,#foo11').carouFredSel({
        auto: false,
        prev: '#prev2,#prev3',
        next: '#next2,#next3',
        mousewheel: true,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    });


    $('#foo3').carouFredSel({
        auto: false,
        prev: '#prev3',
        next: '#next3',
        mousewheel: true,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    });

    $('#foo5').carouFredSel({
        auto: false,
        prev: '#prev3',
        next: '#next3',
        mousewheel: true,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    });

    $('#foo6').carouFredSel({
        auto: false,
        prev: '#prev3',
        next: '#next3',
        mousewheel: true,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    });

    $('#foo7').carouFredSel({
        auto: false,
        prev: '#prev3',
        next: '#next3',
        mousewheel: true,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    });


    $('#foo8').carouFredSel({
        auto: false,
        prev: '#prev3',
        next: '#next3',
        mousewheel: true,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    });

    $('.carousel').carousel();

    $(".c-header-dropdown").click(function () {
        $(".header-user-dropdown").toggle();
    });


    $('#foo1').carouFredSel({
        auto: {
            pauseOnHover: 'resume',
            progress: '#timer1'
        }
    }, {
        transition: true
    });


    $('#foo4').carouFredSel({
        auto: {
            pauseOnHover: 'resume',
            auto: true,
        },
        mousewheel: true,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    }, {
        transition: true
    });
    $("#ex2").slider({});

</script>
</body>
</html>