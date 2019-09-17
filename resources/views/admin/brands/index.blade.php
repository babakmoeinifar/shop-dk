@extends('layouts.admin.master')

@section('content')
    <div dir="rtl">
        @include('partials.sessions')

        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ url('/shoppy/brands/create') }}">
                    ساخت برند جدید <span class="fa fa-plus"></span>
                </a>
                <h3 class="card-title text-center">لیست برندها</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center table-striped">
                    <thead>
                    <tr>
                        <th class="p-4 border-b">ID</th>
                        <th class="p-4 border-b">عکس</th>
                        <th class="p-4 border-b">نام</th>
                        <th class="p-4 border-b">نام انگلیسی</th>
                        <th class="p-4 border-b">دسته</th>
                        <th class="p-4 border-b">کالا</th>
                        <th class="p-4 border-b">کشور</th>
                        <th class="p-4 border-b text-right"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>
                                <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" width="50"
                                     class="rounded-circle">
                            </td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->en_name }}</td>
                            <td>{{ $brand->category->name }}</td>
                            <td>{{ $brand->product->pro_name }}</td>
                            <td>{{ $brand->country }}</td>

                            <td class="row mx-auto">
                                <a href="{{ url('shoppy/brands/'. $brand->id. '/edit') }}"
                                   class="btn btn-link btn-sm">
                                    <i class="fa fa-edit text-secondary" title="ویرایش"></i>
                                </a>
                                <form action="{{ url('shoppy/brands/'. $brand->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-sm deleteCategory">
                                        <i class="fa fa-trash text-danger" title="حذف"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td>بدون برند</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $().ready(function () {
            $('.deleteCategory').click(function () {
                return confirm('آیا از حذف برند مورد نظر اطمینان دارید؟');
            });
        });
    </script>
@endsection
