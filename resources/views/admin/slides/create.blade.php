@extends('layouts.adminLayout.admin_design')

@section('content')
    <div dir="rtl" class="container-fluid mt-3 text-right">
        <form method="POST" action="{{ url('irenadmin/slides') }}" enctype="multipart/form-data">
            @include ('admin.slides._form')
        </form>
    </div>
@endsection
