@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid text-right" dir="rtl">

        <div class="breadcrumb text-secondary col-sm-12 p-1 bg-white font-16 border-bottom ">
            <a href="{{ url('shoppy') }}" class="link">داشبورد </a>
            /
            <a href="{{ url('shoppy/users') }}" class="link"> لیست کاربران </a>
            /
            <a>ساخت کاربر </a>
        </div> <!--END BREADCRUMB-->

        <form action="{{ url('shoppy/users') }}" method="POST" enctype="multipart/form-data">
        @include('admin.users._form')
        </form>

    </div>
@endsection
