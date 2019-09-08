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
                        <th class="p-4 border-b">نام</th>
                        <th class="p-4 border-b">کالا</th>
                        <th class="p-4 border-b">میزان تخفیف</th>
                        <th class="p-4 border-b">کد تخفیف</th>
                        <th class="p-4 border-b">تاریخ شروع</th>
                        <th class="p-4 border-b">تاریخ پایان</th>
                        <th class="p-4 border-b">وضعیت</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($discounts as $discount)
                        <tr>
                            <td>{{ $discount->name }}</td>
                            <td>{{ $discount->product->name }}</td>
                            <td>{{ $discount->value }} %</td>
                            <td>{{ $discount->code }}</td>
                            <td>{{ $discount->begin_date }}</td>
                            <td>{{ $discount->end_date }}</td>
                            <td>
                                <span class="p-1 text-light badge bg-{{ $discount->is_active == 1 ? 'success' : 'danger' }}">
                                {{ $discount->is_active == 1 ? 'فعال' : 'غیرفعال' }}
                                </span>
                            </td>
                            <td class="row mx-auto">
                                <a href="{{ url('shoppy/discounts/'. $discount->id. '/edit') }}"
                                   class="btn btn-link btn-sm">
                                    <i class="fa fa-edit text-secondary" title="ویرایش"></i>
                                </a>
                                <form action="{{ url('shoppy/discounts/'. $discount->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-sm deleteDiscount">
                                        <i class="fa fa-trash text-danger" title="حذف"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

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
            $('.deleteDiscount').click(function () {
                return confirm('آیا از حذف تخفیف مورد نظر اطمینان دارید؟');
            });
        });
    </script>
@endsection
