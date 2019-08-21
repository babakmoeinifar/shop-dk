@extends('layouts.adminLayout.admin_design')

@section('content')
    <div class="breadcrumb text-info col-sm-12 mb-0">
        <div class="col-12 text-right p-0 pt-2 pb-2">
            <a href="{{ url('irenadmin/dashboard')}}">داشبورد </a><i class="fa fa-chevron-left breadcrumb-item"></i>
            <a href="{{ url('irenadmin/comments')}}">نظرات </a><i class="fa fa-chevron-left breadcrumb-item"></i>
            <a>جواب نظرات </a>
        </div>
    </div> <!--END BREADCRUMB-->

    <div class="container-fluid" style="min-height: 800px;"><h3 class="text-center pt-2">جوابها به نظرات</h3>
        @include('includes.show-sessions')

        <table class="table table-striped" dir="rtl">
            <thead>
            <tr class="text-center">
                <th>نویسنده</th>
                <th>موبایل</th>
                <th>جواب</th>
                <th>وضعیت</th>
                <th>حذف</th>
            </tr>
            </thead>

            <tbody>
            @foreach($replies as $reply)
                <tr class="text-center">
                    <td>{{ $reply->user->name }}</td>
                    <td>{{ $reply->user->mobile }}</td>

                    <td>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-light" data-toggle="modal"
                                data-target="#myModal{{ $reply->id }}">
                            {{Illuminate\Support\Str::limit($reply->body,40)}}
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal{{ $reply->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body text-right" style="direction: rtl">
                                        {{$reply->body}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($reply->is_active == 1)
                            <form action="{{ url('irenadmin/comments',$reply->id)}}" method="POST">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="is_active" value="0">
                                <button type="submit" class="btn btn-warning btn-sm">رد کردن</button>
                            </form>
                        @else
                            <form action="{{ url('irenadmin/comments',$reply->id)}}" method="POST">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="is_active" value="1">
                                <button type="submit" class="btn btn-success btn-sm pl-4 pr-4">تایید</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <form action="{{ url('irenadmin/comments',$reply->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm pl-4 pr-4">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>



@endsection