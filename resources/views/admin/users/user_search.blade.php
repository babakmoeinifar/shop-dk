@extends('layouts.adminLayout.admin_design')


@section('content')

    <div class=" mb-2 mx-auto pt-5" style="min-height: 800px;">
        @if($user)
            <div class="card shadow pt-3 m-3" style="height: 400px;">
                <div class="card-body text-justify" dir="rtl">
                    <div class="row">
                        <img alt="{{ $user->name }}" class="img-fluid mr-3 pr-2 lazyload blur-up rounded-circle"
                             style="height: 100px"
                             data-src="{{ $user->image ? asset($user->image) : asset('images/users/user.png')}}">
                        <h2 class="card-title pt-4 pr-3">{{$user->name}}</h2>

                    </div>
                    <hr>
                    <p class="card-text">یوزرنیم: {{ $user->phone ?? 'نامشخص' }}</p>
                    <p class="card-text">وضعیت: {{ $user->is_active == 1 ? 'فعال' : 'غیرفعال' }}</p>

                    <button type="button" class="btn btn-link"
                            data-toggle="modal" data-target="#userModal{{ $user->id }}">
                        مشاهده اطلاعات کاربر
                    </button>

                    <a href="{{url('irenadmin/users/'.$user->id.'/edit')}}" class="card-link float-left text-primary"><i
                                class="fa fa-caret-left">&nbsp;</i>ویرایش کاربر</a>
                    @if($business)
                        <a href="{{ url('/business-information/'. $business->id) }}"
                           class="card-link float-left text-active ml-5"><i
                                    class="fa fa-caret-left">&nbsp;</i>ویرایش کسب و کار</a>
                    @endif

                    <a href="{{ url('irenadmin/send-message', $user->id ) }}"
                       class="card-link float-left text-active bg-white border-0 text-primary ml-5"
                       style="cursor: pointer"><i class="fa fa-caret-left">&nbsp;</i>ارسال پیام</a>

                </div>
            </div>

            <!-- User Modal -->
            <div class="modal fade" id="userModal{{ $user->id }}" dir="rtl">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;
                            </button>
                            <h3 class="modal-title">{{ $user->name }}</h3>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body text-right">
                            <img src="{{ $user->image ? asset($user->image) : asset('images/users/user.png')}}" alt="UserAvatar"
                                 width="120" class="mb-3 rounded-circle">
                            <p>نام کاربری(موبایل): {{ $user->phone }}</p>
                            <p>نقش: {{ $user->role->name }}</p>
                            <p>ایمیل: {{ $user->email ?? 'نامشخص' }}</p>
                            <p>شهر: {{ $user->city->title ?? 'نامشخص' }}</p>
                            @if($user->business->expires_at != null)
                                <p>تاریخ انقضای پنل: {{ \Carbon\Carbon::parse($user->business->expires_at)->diffInDays() }} روز دیگر</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
    @else
            <h3 class="text-info mt-5 text-center" style="direction: rtl">کاربری با شماره موبایل وارد شده موجود نمی
                باشد</h3>
    @endif
    </div>

@endsection