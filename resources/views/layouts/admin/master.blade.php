<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>دیجیکالا</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
</head>
<body>
@include('layouts.admin.header')

<div class="col-lg-12">
    @include('layouts.admin.sidebar')

    <div class="col-lg-9" style="float: left !important; ">
        <section>
            @yield('content')
        </section>
    </div>
</div>

<div class="dark"></div>


<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>