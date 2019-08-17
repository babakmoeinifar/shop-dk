@extends('layouts.adminLayout.admin_design')

@section('content')
    <div class="container-fluid mt-3">
        @include('includes.show-sessions')

        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ url('/irenadmin/slides/create') }}">
                    ساخت اسلاید جدید <span class="fa fa-plus"></span>
                </a>
                <h3 class="card-title text-center">اسلایدها</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center table-striped">
                    <thead>
                    <tr>
                        <th>حذف</th>
                        <th>ویرایش</th>
                        <th>اسلاید</th>
                        <th>لینک اسلاید</th>
                        <th>نام اسلاید</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach( $slides as $slide)
                        <tr>
                            <td>
                                <form action="{{url('irenadmin/slides/'. $slide->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link deleteSlide">
                                        <i class="fa fa-trash text-danger" title="حذف"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">
                                <a href="{{ url('irenadmin/slides/'. $slide->id. '/edit') }}">
                                    <i class="fa fa-edit text-info btn btn-light" title="ویرایش"></i>
                                </a>
                            </td>

                            <td class="text-center">
                                @if(!empty($slide->image))
                                    <img data-src="{{ asset($slide->image) }}"
                                         style="width:200px;" class="lazyload blur-up" alt="slide">
                                @endif
                            </td>
                            <td>{{ $slide->url }}</td>

                            <td>{{ $slide->title }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6 offset-5">
                        {{$slides->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $().ready(function () {
            $('.deleteSlide').click(function () {
                return confirm('آیا از حذف این مورد اطمینان دارید؟');
            });
        });
    </script>
@endsection