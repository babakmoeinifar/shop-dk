@extends('layouts.adminLayout.admin_design')
@section('content')
   <div class="container" style="min-height: 500px;" dir="rtl">
       @include('includes.show-sessions')
       <h3 class="text-center pt-2">ارسال پیام به کاربر</h3>
    <form action="{{ url('irenadmin/send-message',$user->id)}}" method="POST" class="form-group text-right">
        @csrf
       <h4 dir="rtl"> پیام برای کاربر: <span class="text-cyan">{{$user->name}}</span></h4>


        <label class="form-control-label" for="subject">موضوع پیام</label>
        <input type="text" name="subject" id="subject" class="form-control"/>

        <label class="form-control-label" for="message">متن پیام</label>
        <textarea type="text" name="message" id="message" class="form-control" rows="5"></textarea>

        <input type="submit" value="ارسال پیام" class="btn btn-success mt-2">
    </form>
   </div>

@endsection