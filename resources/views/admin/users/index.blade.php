@extends('layouts.adminLayout.admin_design')

@section('content')
    <div dir="rtl">
        @include('includes.show-sessions')

        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ url('/irenadmin/users/create') }}">
                    ساخت کاربر جدید <span class="fa fa-plus"></span>
                </a>
                <h3 class="card-title text-center">لیست کاربران</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center">
                    <tr>
                        <th>آواتار</th>
                        <th>نام</th>
                        <th>نام کاربری</th>
                        <th>نقش</th>
                        <th>ارسال پیام</th>
                        <th>وضعیت</th>
                        <th class="text-right">عملیات</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{url($user->image ?: 'images/users/user.png')}}" alt="user"
                                     class="rounded-circle" style="width: 40px">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                <a href="{{ url('irenadmin/send-message', $user->id )}}"
                                   class="btn btn-link">
                                    <i class="fa fa-envelope">&nbsp;</i>
                                </a>
                            </td>
                            <td>
                                    <span class="p-1 text-light badge bg-{{ $user->is_active == 1 ? 'success': 'danger' }}">
                                        {{$user->is_active == 1 ? 'فعال' : 'تایید نشده'}}
                                    </span>
                            </td>
                            <td class="row mx-auto" style="font-size: 18px;">
                                <button type="button" class="btn btn-link" title="مشاهده اطلاعات کاربر"
                                        data-toggle="modal" data-target="#userModal{{ $user->id }}">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <a href="{{url('irenadmin/users/'. $user->id . '/edit')}}">
                                    <i class="fa fa-edit text-info btn btn-link" title="ویرایش"></i>
                                </a>&nbsp;

                                <form action="{{url('irenadmin/users/'. $user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link deleteUser"
                                            @if($user->isAdmin || $user->isSupport)
                                            disabled="disabled"
                                            @endif
                                    >
                                        <i class="fa fa-trash text-danger" title="حذف">
                                        </i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- User Modal -->
                        <div class="modal fade" id="userModal{{ $user->id }}">
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
                                        <img src="{{ asset($user->image ?? 'images/users/user.png' )}}" alt="UserAvatar"
                                             width="120" class="mb-3 rounded-circle">
                                        <p>نام کاربری(موبایل): {{ $user->phone }}</p>
                                        <p>نقش: {{ $user->role->name }}</p>
                                        <p>تاریخ عضویت: <span
                                                    dir="ltr">{{verta( $user->created_at)->formatDate() }}</span></p>
                                        <p>کدملی: {{ $user->nationalcode ?? 'نامشخص' }}</p>
                                        <p>ایمیل: {{ $user->email ?? 'نامشخص' }}</p>
                                        <p>شهر: {{ $user->city->title ?? 'نامشخص' }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            <div class="text-center mx-auto mt-3">
                {{ $users->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>

@endsection
@section('scripts')

    <script>
        $('.deleteUser').click(function () {
            return confirm('آیا از حذف کاربر مورد نظر اطمینان دارید؟');
        });
    </script>
@endsection