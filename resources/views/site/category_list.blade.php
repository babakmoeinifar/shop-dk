@extends('layouts.site.master')
@section('content')

    <div class="container-fluid">
        <products this_category="{{ $this_category }}"
                  zero_category="{{ $zero_category }}"
                  main_category="{{ $main_category }}"
        ></products>
    </div>
@endsection

