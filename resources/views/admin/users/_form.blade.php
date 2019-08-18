@section('styles')
    <link href="{{asset('css/dropify.min.css')}}" rel="stylesheet">
@endsection

@include('partials.sessions')
@csrf

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="fname">نام<span class="text-danger font-weight-bold"> *</span></label>
            <input type="text" class="form-control {{ $errors->has('fname') ? 'is-danger' : '' }}"
                   id="fname" name="fname" value="{{ old('fname', $user->fname) }}" required>
            @error('fname')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="lname">نام خانوادگی<span class="text-danger font-weight-bold"> *</span></label>
            <input type="text" class="form-control {{ $errors->has('lname') ? 'is-danger' : '' }}"
                   id="lname" name="lname" value="{{ old('lname', $user->lname) }}" required>
            @error('lname')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="mobile">شماره موبایل
                <span class="text-danger font-weight-bold"> *</span>
            </label>
            <input id="mobile" type="number" name="mobile" class="form-control"
                   value="{{ old('mobile', $user->mobile)}}" required>
            @error('mobile')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="email">ایمیل</label>
            <input id="email" type="email" name="email"
                   class="form-control" value="{{ old('email', $user->email) }}">
            @error('email')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="nationalcode">کد ملی</label>
            <input type="number" class="form-control {{ $errors->has('nationalcode') ? 'is-danger' : '' }}"
                   id="nationalcode" name="nationalcode" value="{{ old('nationalcode', $user->nationalcode) }}">
            @error('nationalcode')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="bankcard">شماره کارت بانکی</label>
            <input type="number" class="form-control {{ $errors->has('bankcard') ? 'is-danger' : '' }}"
                   id="bankcard" name="bankcard" value="{{ old('bankcard', $user->bankcard) }}">
            @error('bankcard')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label for="is_active">وضعیت</label>
        <select type="text" class="form-control" id="is_active" name="is_active">
            <option value="1" {{old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>فعال</option>
            <option value="0" {{old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>غیرفعال</option>
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

<div class="row mx-auto">
    <div class="col-md-4 form-group">
        <label for="password">رمزعبور
            {{--                        <small>در صورت نیاز به تغییر، رمز جدید را وارد نمایید</small>--}}
        </label>
        <input type="password" name="password" id="password" class="form-control">
        @error('password')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group col-md-4">
        {{--                    <img src="{{url($user->image ?: 'images/users/user.png')}}"--}}
        {{--                         class="img-fluid rounded-circle ml-2 lazyload blur-up mb-2" alt="userImage">--}}
    </div>

    <div class="form-group col-md-4">
        <label for="image">عکس</label>
        <input type="file" name="image" id="image" class="dropify" data-height="200"
               data-show-loader="true" autofocus data-default-file="" data-show-remove="true"
               data-max-file-size="15M" data-allowed-file-extensions="jpg png jpeg gif" accept="image/*"/>
    </div>
</div>

<button type="submit" class="btn btn-success font-20">{{ $buttonText ?? 'ثبت کاربر' }}</button>

<a href="{{ url('shoppy/users') }}" class="btn btn-link">صفحه قبل</a>

@section('scripts')
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script rel="script" src="{{ asset('js/dropify_use.js') }}"></script>

@endsection