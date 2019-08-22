@extends('layouts.admin.master')

@section('content')
    <div dir="rtl">
        @include('partials.sessions')

        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ url('/shoppy/products/create') }}">
                    ساخت محصول جدید <span class="fa fa-plus"></span>
                </a>
                <h3 class="card-title text-center">لیست محصولات</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center table-striped">
                    <thead>
                    <tr>
                        <th class="p-4 border-b">ID</th>
                        <th class="p-4 border-b">عکس</th>
                        <th class="p-4 border-b">نام</th>
                        <th class="p-4 border-b">دسته بندی</th>
                        <th class="p-4 border-b">قیمت</th>
                        <th class="p-4 border-b">موجودی</th>
                        <th class="p-4 border-b">وضعیت</th>
                        <th class="p-4 border-b text-right"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="50"
                                     class="rounded-circle">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <span class="p-1 text-light badge bg-{{ $product->is_active == 1 ? 'success': 'danger' }}">
                                {{ $product->is_active == 1 ? 'فعال' : 'غیرفعال' }}
                                </span>
                            </td>
                            <td class="row mx-auto">
                                <button type="button" data-toggle="modal"
                                        data-target="#pageModal{{ $product->id }}"
                                        class="btn btn-link btn-sm">
                                    <i class="fa fa-eye text-primary" title="مشاهده"></i>
                                </button>
                                <a href="{{ url('shoppy/products/'. $product->id. '/edit') }}"
                                   class="btn btn-link btn-sm">
                                    <i class="fa fa-edit text-secondary" title="ویرایش"></i>
                                </a>
                                <form action="{{ url('shoppy/products/'. $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-sm deleteCategory">
                                        <i class="fa fa-trash text-danger" title="حذف"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- The Modal -->
                        <div class="modal fade" id="pageModal{{ $product->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header" dir="ltr">
                                        <h4 class="modal-title text-center">جزییات</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body text-right">
                                        <h4>{{ $product->name }}</h4>
                                        <hr>
                                        <p>واحد: {{ $product->unit }}</p>
                                        <p>قیمت: {{ $product->price }}</p>
                                        <p>موجودی: {{ $product->stock }}</p>
                                        <p>دسته بندی: {{ $product->category->name }}</p>
                                        <p>کشور سازنده: {{ $product->country }}</p>
                                        <p>
                                            <small>کلمات کلیدی:</small>{{ $product->meta_keywords }}</p>
                                        <p>توضیحات: {!! $product->desc !!}</p>

                                    </div>

                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td>بدون محصول</td>
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
                return confirm('آیا از حذف محصول مورد نظر اطمینان دارید؟');
            });
        });
    </script>
@endsection