<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Babak Moeinifar - بابک معینی فر - babakus7@gmail.com - instagram@babakmoeini">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>shoppy</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">--}}
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

        $(".c-header-dropdown").click(function () {
            $(".header-user-dropdown").toggle();
        });
    });
</script>
@yield('scripts')

</body>
</html>
