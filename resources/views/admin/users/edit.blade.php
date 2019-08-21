@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid text-right" dir="rtl">

        <div class="breadcrumb text-secondary col-sm-12 p-1 bg-white font-16 border-bottom ">
            <a href="{{url('irenadmin')}}" class="link">داشبورد </a>
            /
            <a href="{{url('irenadmin/users')}}" class="link"> لیست کاربران </a>
            /
            <a>ویرایش کاربر </a>
        </div> <!--END BREADCRUMB-->

        <form action="{{ url("shoppy/users/{$user->id}") }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('admin.users._form', ['buttonText' => 'ویرایش کاربر'])
        </form>

    </div>

@endsection