@extends('layouts.adminLayout.admin_design')

@section('content')
    <div class="container-fluid text-right" dir="rtl">

        <div class="breadcrumb text-secondary col-sm-12 p-1 bg-white font-16 border-bottom ">
            <a href="{{url('irenadmin')}}" class="link">داشبورد </a><i
                    class="fa fa-chevron-left breadcrumb-item"></i>
            <a href="{{url('irenadmin/users')}}" class="link"> لیست کاربران </a><i
                    class="fa fa-chevron-left breadcrumb-item"></i>
            <a>ساخت کاربر </a>
        </div> <!--END BREADCRUMB-->

        <form action="{{url('irenadmin/users')}}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">نام و نام خانوادگی<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-danger' : '' }}"
                               id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone">شماره موبایل
                            <small> (نام کاربری)</small> <span class="text-danger"> *</span>
                        </label>
                        <input id="phone" type="number" name="phone" class="form-control"
                               value="{{ old('phone')}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input id="email" type="email" name="email"
                               class="form-control" value="{{ old('email') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nationalcode">کد ملی</label>
                        <input type="number" class="form-control {{ $errors->has('nationalcode') ? 'is-danger' : '' }}"
                               id="nationalcode" name="nationalcode" value="{{ old('nationalcode') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">انتخاب استان</label>
                        <select class="form-control" id="state" name="state_id" type="text">
                            <option>انتخاب استان</option>
                            @foreach($cities->where('parent_id', 0) as $state)
                                <option value="{{$state->id}}">{{$state->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">انتخاب شهر</label>
                        <select class="form-control" id="city" name="city_id">
                            <option value="{{old('city_id')}}">ابتدا استان انتخاب شود</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="is_active">وضعیت</label>
                    <select type="text" class="form-control" id="is_active" name="is_active">
                        <option value="1" {{old('is_active') == 1 ? 'selected' : '' }}>فعال</option>
                        <option value="0" {{old('is_active') == 0 ? 'selected' : '' }}>غیرفعال</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="role_id">دسترسی</label>
                    <select type="text" class="form-control" id="role_id" name="role_id">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" {{ old('role_id') == $role->id ? 'selected':'' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <p>رمز عبور همان شماره موبایل وارد شده خواهد شد</p>

            <button type="submit" class="btn btn-success btn-block font-20">ایجاد کاربر</button>
        </form>

        @include('includes.form-error')
    </div>
@endsection
@section('scripts')
    <script rel="script" src="{{ asset('js/AjaxCity.js') }}"></script>
@endsection