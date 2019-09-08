@extends('layouts.admin.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/persianDatepicker-default.css') }}">
@endsection
@section('content')
    <div dir="rtl" class="container col-md-10 text-right">
        @include('partials.sessions')
        <discount buttontext="ثبت تخفیف"></discount>

        <a href="{{ url('shoppy/discounts') }}" class="btn btn-link float-left">صفحه قبل</a>

        @include('partials.errors')
    </div>
@endsection
