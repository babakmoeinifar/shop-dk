@extends('layouts.adminLayout.admin_design')

@section('content')
    <div class="container-fluid" style="min-height: 800px">
        <h3 class="text-center pt-2">نظرات</h3>
        @include('includes.show-sessions')

        @if(count($comments) > 0)
            <table class="table table-striped text-center" dir="rtl">
                <thead>
                <tr>
                    <th>نویسنده</th>
                    <th>یوزرنیم نویسنده</th>
                    <th>نام کسب و کار گیرنده نظر</th>
                    <th>نظر</th>
                    <th>جواب</th>
                    <th>وضعیت</th>
                    <th>حذف</th>
                </tr>
                </thead>

                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->user->name}}</td>
                        <td>{{$comment->user->mobile}}</td>
                        <td><a @if($comment->product->is_active == 1) href="{{url('/'.$comment->product_id)}}" @endif>{{$comment->product->name}}</a></td>
                        <td>
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal{{ $comment->id }}">
                                {{Illuminate\Support\Str::limit($comment->body,40)}}
                            </button>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModal{{ $comment->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body text-right">
                                            {{$comment->body}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><a href="{{ url('irenadmin/comments/replies',$comment->id) }}">
                                <span class="badge badge-info">{{\App\Comment::where(['is_active' => 0, 'comment_id' => $comment->id])->count()}}</span>
                                دیدن جواب ها</a></td>

                        <td>
                            @if($comment->is_active == 1)
                                <form action="{{ url('irenadmin/comments',$comment->id)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="is_active" value="0">
                                    <button type="submit" class="btn btn-warning btn-sm">رد کردن</button>
                                </form>
                            @else
                                <form action="{{ url('irenadmin/comments',$comment->id)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="is_active" value="1">
                                    <button type="submit" class="btn btn-success btn-sm">تایید</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ url('irenadmin/comments',$comment->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="mx-auto">
                    {{$comments->render()}}
                </div>
            </div>
        @else
            <h3 class=" mt-5 text-info text-center">نظری موجود نیست</h3>
        @endif
    </div>
@endsection