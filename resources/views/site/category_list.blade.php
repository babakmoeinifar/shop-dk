@extends('layouts.site.master')
@section('content')
    <div class="col-lg-12">

    <div class="col-lg-3" style="top:2%;position: absolute;max-width: 19.2%;">
    <div class="card" style="min-height:180px;">
        <div class="card-header"
             style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;">
            دسته بندی نتایج
        </div>
        <div class="card-body">
            <ul class='categories'>
                @if($zero_category)
                    <li><i class='fa fa-angle-left'></i><a>{{ $zero_category->name }}</a></li>
                @endif
                @if($main_category)
                    <li style='padding: 10px'><i class='fa fa-angle-down'></i><a
                            href='/search/{{ $main_category->id }}'>{{ $main_category->name }}</a></li>
                @endif
                <li style='padding-right: 25px;font-weight: bold;'>
                    <i class='fa fa-angle-down'></i><a>{{ $this_category->name }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>

    <products category_id="{{ $this_category }}"
              zero_category="{{ $zero_category }}"
              main_category="{{ $main_category }}"
    ></products>
    </div>
@endsection
@section('scripts')
{{--    <script src="{{ asset('js/sort.js') }}"></script>--}}
@endsection
