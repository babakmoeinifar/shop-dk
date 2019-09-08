@extends('layouts.admin.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/persianDatepicker-default.css') }}">
@endsection
@section('content')
    <div dir="rtl" class="container text-right">
        @include('partials.sessions')
        <discount buttontext="ویرایش تخفیف"></discount>

        <a href="{{ url('shoppy/discounts') }}" class="btn btn-link float-left">صفحه قبل</a>

        @include('partials.errors')
    </div>
@endsection
