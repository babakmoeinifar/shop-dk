@extends('layouts.admin.master')

@section('content')
    <div dir="rtl">
        @include('partials.sessions')

        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ url('/shoppy/discounts/create') }}">
                    ایجاد تخفیف برای کالا <span class="fa fa-plus"></span>
                </a>
                <h3 class="card-title text-center">لیست تخفیف ها</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center table-striped">
                    <thead>
                    <tr>
                        <th class="p-4 border-b">ID</th>
                        <th class="p-4 border-b">نام</th>
                        <th class="p-4 border-b">وضعیت</th>
                        <th class="p-4 border-b text-right">عملیات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($discounts as $discount)
                        <tr class="{{ $discount->is_active ? '' : 'bg-orange' }}">
                            <td>{{ $discount->id }}</td>
                            <td>{{ $discount->name }}</td>
                            <td class="{{ $discount->is_active == 1 ? 'text-success' : 'text-danger' }} small">
                                {{ $discount->is_active == 1 ? 'فعال' : 'غیرفعال' }}
                            </td>
                            <td class="row mx-auto">
                                <button type="button" data-toggle="modal"
                                        data-target="#pageModal{{ $discount->id }}"
                                        class="btn btn-link btn-sm">
                                    <i class="fa fa-eye text-primary" title="مشاهده"></i>
                                </button>
                                <a href="{{ url('shoppy/discounts/'. $discount->id. '/edit') }}"
                                   class="btn btn-link btn-sm">
                                    <i class="fa fa-edit text-secondary" title="ویرایش"></i>
                                </a>
                                <form action="{{ url('shoppy/disconts/'. $discount->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-sm deleteCategory">
                                        <i class="fa fa-trash text-danger" title="حذف"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- The Modal -->
                        <div class="modal fade" id="pageModal{{ $discount->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header" dir="ltr">
                                        <h4 class="modal-title text-center">جزییات</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body text-center">
                                        <h4><small>عنوان دسته: </small>{{ $discount->name }}</h4>
                                        <h4 dir="rtl"><small>آدرس دسته: </small>{{ $discount->slug }}</h4>
                                        <hr>
                                        <b>SEO</b>
                                        <hr>
                                        <h4><small>عنوان سئو: </small>{{ $discount->meta_title }}</h4>
                                        <h4><small>توضیحات سئو: </small>{{ $discount->meta_description }}</h4>
                                        <h4><small>کلمات کلیدی: </small>{{ $discount->meta_keywords }}</h4>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td>بدون تخفیف</td>
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
                return confirm('آیا از حذف تخفیف مورد نظر اطمینان دارید؟');
            });
        });
    </script>
@endsection