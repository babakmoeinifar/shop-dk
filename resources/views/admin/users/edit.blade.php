@extends('layouts.adminLayout.admin_design')

@section('content')
    <div class="container-fluid text-right" dir="rtl">

        <div class="breadcrumb text-secondary col-sm-12 p-1 bg-white font-16 border-bottom ">
            <a href="{{url('irenadmin')}}" class="link">داشبورد </a><i
                    class="fa fa-chevron-left breadcrumb-item"></i>
            <a href="{{url('irenadmin/users')}}" class="link"> لیست کاربران </a><i
                    class="fa fa-chevron-left breadcrumb-item"></i>
            <a>ویرایش کاربر </a>
        </div> <!--END BREADCRUMB-->


        <form action="{{ url("irenadmin/users/{$user->id}") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">نام و نام خانوادگی<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-danger' : '' }}"
                               id="name" name="name" value="{{ $user->name ?? old('name') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone">شماره موبایل
                            <small> (نام کاربری)</small>
                            <span class="text-danger"> *</span>
                        </label>
                        <input id="phone" type="number" name="phone" class="form-control"
                               value="{{ $user->phone ?? old('phone')}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input id="email" type="email" name="email"
                               class="form-control" value="{{ $user->email ?? old('email') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nationalcode">کد ملی</label>
                        <input type="number"
                               class="form-control {{ $errors->has('nationalcode') ? 'is-danger' : '' }}"
                               id="nationalcode" name="nationalcode"
                               value="{{ $user->nationalcode ?? old('nationalcode') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">انتخاب استان</label>
                        <select class="form-control" id="state" name="state_id" type="text">
                            <option>در صورت نیاز به تغییر، استان جدید را انتخاب نمایید</option>
                            @foreach($cities->where('parent_id', 0) as $state)
                                <option value="{{ $state->id }}">{{ $state->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">انتخاب شهر</label>
                        <select class="form-control" id="city" name="city_id">
                            <option value="{{ $user->city_id }}"
                                    {{ old('city_id') == $user->city_id ? 'selected' : '' }}>
                                {{ $user->city->title ?? 'ابتدا استان انتخاب شود' }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="is_active">وضعیت</label>
                    <select type="text" class="form-control" id="is_active" name="is_active">
                        <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>فعال</option>
                        <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>غیرفعال</option>
                    </select>
                </div>

                <div class="col-md-4 form-group">
                    <label for="role_id">دسترسی</label>
                    <small> (پذیرنده انتخاب نشود و به صورت روند کاری پذیرنده شود)</small>
                    <select type="text" class="form-control" id="role_id" name="role_id">
                        <option value="{{ $user->role_id }}" {{ old('role_id') == $user->role_id ? 'selected':'' }}>{{ $user->role->name }}</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected':'' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 form-group">
                    <label for="password">رمزعبور
                        <small>در صورت نیاز به تغییر، رمز جدید را وارد نمایید</small>
                    </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-4">
                    <img data-src="{{ asset($user->image ?: 'images/users/user.png') }}"
                         class="img-fluid rounded-circle ml-2 lazyload blur-up mb-2" alt="userImage">
                </div>

                <div class="form-group col-8">
                    <label for="image">عکس</label>
                    <input type="file" name="image" class="dropify" data-show-loader="true"
                           data-max-file-size="15000K" data-allowed-file-extensions="jpg png jpeg gif"/>
                </div>
            </div>

            <button type="submit" class="btn btn-warning btn-block mb-2">ویرایش کاربر</button>
        </form>


        <div class="row">
            <div class="col-sm-9 offset-3">
                @include('includes.form-error')
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('js/front_js/dropify.min.js')}}"></script>
    <script rel="script" src="{{ asset('js/dropify_use.js') }}"></script>
    <script rel="script" src="{{ asset('js/AjaxCity.js') }}"></script>
    <script>
        $().ready(function () {
            $('.delUser').click(function () {
                return confirm('آیا از حذف کاربر مورد نظر اطمینان دارید؟');
            });
        });
    </script>
@endsection