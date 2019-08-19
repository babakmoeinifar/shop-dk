<!doctype html>
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
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <style>
        input.is-danger {
            border-color: orangered;
        }
    </style>
    @yield('styles')
</head>
<body>

<div id="app">
    @include('layouts.admin.header')

    <div class="col-12">
        @include('layouts.admin.sidebar')

        <div class="col-xl-10 col-lg-9 col-md-8" style="float: left !important; ">
            <section>
                @yield('content')
            </section>
        </div>
    </div>

    <div class="dark"></div>
</div>


<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/html_message_fa.js') }}"></script>

@yield('scripts')
</body>
</html>