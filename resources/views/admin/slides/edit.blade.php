@extends('layouts.adminLayout.admin_design')

@section('content')
    <div dir="rtl" class="container-fluid mt-3 text-right">

        <form method="POST" action='{{ url("irenadmin/slides/{$slide->id}") }}' enctype="multipart/form-data">
            @method('PATCH')
            @include ('admin.slides._form', ['buttonText' => 'ویرایش اسلاید'])
        </form>
    </div>
@endsection
