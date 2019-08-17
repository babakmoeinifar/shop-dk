@extends('layouts.adminLayout.admin_design')
@section('content')
    <div class="container text-right" style="min-height: 700px;" dir="rtl">
        @include('includes.show-sessions')
        @include('includes.form-error')
        <h3 class="text-center pt-2">ارسال پیام گروهی</h3>
        <form action="{{ url('irenadmin/group-message') }}" method="POST" class="form-group text-right">
            @csrf

            <div class="row p-3" style="background-color: #f5f5f5">
                <h4>مخاطب گیرنده پیام: </h4>

                <label for="users" class="mr-3">برای همه کاربران
                    <input id="users" class="form-check-inline" type="radio" name="msg" value="0">
                </label>
                <label for="buses" class="mr-3">برای همه کسب و کار ها
                    <input id="buses" class="form-check-inline" type="radio" name="msg" value="1">
                </label>
            </div>

            <label class="form-control-label">موضوع پیام</label>
            <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}" required/>

            <label class="form-control-label">متن پیام</label>
            <textarea type="text" name="message" id="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>

            <input type="submit" value="ارسال پیام" class="btn btn-success mt-2">
        </form>
    </div>

@endsection