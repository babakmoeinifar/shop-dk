@extends('layouts.admin.master')

@section('content')
    <div dir="rtl">
        @include('partials.sessions')

        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ url('/shoppy/categories/create') }}">
                    ساخت دسته بندی جدید <span class="fa fa-plus"></span>
                </a>
                <h3 class="card-title text-center">لیست دسته بندی ها</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center table-striped">
                    <thead>
                    <tr>
                        <th class="p-4 border-b">ID</th>
                        <th class="p-4 border-b">نام</th>
                        <th class="p-4 border-b">نامک</th>
                        <th class="p-4 border-b">دسته مادر</th>
                        <th class="p-4 border-b">وضعیت</th>
                        <th class="p-4 border-b text-right">عملیات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($categories as $category)
                        <tr class="{{ $category->is_active ? '' : 'bg-orange' }}">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td class="small">{{ $category->parent->name ?? 'اصلی' }}</td>
                            <td class="{{ $category->is_active == 1 ? 'text-success' : 'text-danger' }} small">
                                {{ $category->is_active == 1 ? 'فعال' : 'غیرفعال' }}
                            </td>
                            <td class="row mx-auto">
                                <button type="button" data-toggle="modal"
                                        data-target="#pageModal{{ $category->id }}"
                                        class="btn btn-link btn-sm">
                                    <i class="fa fa-eye text-primary" title="مشاهده"></i>
                                </button>
                                <a href="{{ url('shoppy/categories/'. $category->slug. '/edit') }}"
                                   class="btn btn-link btn-sm">
                                    <i class="fa fa-edit text-secondary" title="ویرایش"></i>
                                </a>
                                <form action="{{ url('shoppy/categories/'. $category->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-sm deleteCategory">
                                        <i class="fa fa-trash text-danger" title="حذف"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- The Modal -->
                        <div class="modal fade" id="pageModal{{ $category->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header" dir="ltr">
                                        <h4 class="modal-title text-center">جزییات</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body text-center">
                                        <h4><small>عنوان دسته: </small>{{ $category->name }}</h4>
                                        <h4 dir="rtl"><small>آدرس دسته: </small>{{ $category->slug }}</h4>
                                        <hr>
                                        <b>SEO</b>
                                        <hr>
                                        <h4><small>عنوان سئو: </small>{{ $category->meta_title }}</h4>
                                        <h4><small>توضیحات سئو: </small>{{ $category->meta_description }}</h4>
                                        <h4><small>کلمات کلیدی: </small>{{ $category->meta_keywords }}</h4>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td>بدون دسته بندی</td>
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
                return confirm('آیا از حذف دسته بندی مورد نظر اطمینان دارید؟ با این کار ممکن است تمام منطق سایت به هم بریزد و مشکل اساسی ایجاد شود!!');
            });
        });
    </script>
@endsection