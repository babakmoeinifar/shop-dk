@extends('layouts.admin.master')

@section('content')
    <div dir="rtl">
        @include('partials.sessions')

        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ url('/shoppy/users/create') }}">
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
                        <th>نقش</th>
                        <th>وضعیت</th>
                        <th></th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ url($user->image ?: 'images/users/user.png') }}" alt="user"
                                     class="rounded-circle" style="width: 40px">
                            </td>
                            <td>{{ $user->fname }} {{ $user->lname }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                    <span class="p-1 text-light badge bg-{{ $user->is_active == 1 ? 'success': 'danger' }}">
                                        {{$user->is_active == 1 ? 'فعال' : 'تایید نشده'}}
                                    </span>
                            </td>
                            <td class="row">
                                <button type="button" class="btn btn-link btn-sm" title="مشاهده اطلاعات کاربر"
                                        data-toggle="modal" data-target="#userModal{{ $user->id }}">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <a href="{{url('shoppy/users/'. $user->id . '/edit')}}">
                                    <i class="fa fa-edit text-secondary btn btn-link btn-sm" title="ویرایش"></i>
                                </a>&nbsp;

                                <form action="{{url('shoppy/users/'. $user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-sm deleteUser"
                                            @if($user->isAdmin || $user->isSupport)
                                            disabled="disabled"
                                            @endif
                                    >
                                        <i class="fa fa-trash text-danger" title="حذف"></i>
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
                                        <p>موبایل: {{ $user->mobile }}</p>
                                        <p>کدملی: {{ $user->nationalcode ?? 'نامشخص' }}</p>
                                        <p>ایمیل: {{ $user->email ?? 'نامشخص' }}</p>
                                        <p>شماره کارت بانکی: {{ $user->bankcard ?? 'نامشخص' }}</p>
                                        <p>نقش: {{ $user->role->name }}</p>
                                        <p>تاریخ عضویت: <span
                                                    dir="ltr">{{verta( $user->created_at)->formatDate() }}</span></p>
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