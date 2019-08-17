@extends('layouts.admin.master')

@section('content')
    <div dir="rtl" class="container text-right">
        @include('partials.sessions')
        <category buttontext="ویرایش دسته بندی"></category>

        <a href="{{ url('shoppy/categories') }}" class="btn btn-link float-left">صفحه قبل</a>

        @include('partials.errors')
    </div>
@endsection
