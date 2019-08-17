@extends('layouts.adminLayout.admin_design')
@section('content')
    @include('includes.show-sessions')
    @include('includes.form-error')


    <div class="container-fluid table-responsive" style="min-height: 700px;direction: rtl">
        <h4 class="text-center text-info">پیام های ارسال شده به کاربران</h4>
        @if(count($allMsgs)>0)

            <table id="example" class="table table-striped table-inverse table-bordered table-hover text-center" dir="rtl">
                <thead>
                <tr class="text-light bg-orange">
                    <th>فرستنده</th>
                    <th>کاربرگیرنده پیام</th>
                    <th>یوزر کاربر</th>
                    <th>موضوع</th>
                    <th>متن</th>
                    <th>تاریخ ارسال</th>
                    <th>تاریخ مشاهده</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allMsgs as $message)
                    <tr>
                        <td>{{ $message->sent_by }}</td>
                        <td>{{ $message->user->name }}</td>
                        <td>{{ $message->user->phone }}</td>
                        <td>{{ $message->subject }}</td>
                        <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal{{$message->id}}">
                                متن پیام
                            </button>
                        </td>
                        <td>{{ verta($message->created_at)->formatDate() }}</td>
                        <td>{{ $message->seen == 1 ? verta($message->updated_at)->formatDate() : 'دیده نشده' }}</td>
                    </tr>

                    <!-- The Modal message body -->
                    <div class="modal" id="myModal{{$message->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body text-right" dir="rtl">
                                    {{ $message->message }}
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>

            <div class="row mt-2">
                <div class="mx-auto">
                    {{$allMsgs->render()}}
                </div>
            </div>
        @else
            <hr>
            <h5 class="text-center text-info">سابقه موجود نمی باشد</h5>
        @endif
    </div>
@endsection

