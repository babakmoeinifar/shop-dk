<?php

namespace App\Http\Controllers\Admin;

use App\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('admin.discounts.create');
    }

    public function store()
    {
        Discount::create(
            request()->validate([
                'name' => 'required|min:3',
                'code' => 'required|unique:discounts',
                'product_id' => 'required',
                'value' => 'required|min:0|max:100',
                'begin_date' => 'required',
                'end_date' => 'required',
            ])
        );
        return response('تخفیف ایجاد شد');
    }

    public function edit(Discount $discount)
    {
        $discounts = Discount::get();
        if (request()->wantsJson()) {
            return $discount;
        }
        return view('admin.discounts.edit', compact('discount', 'discounts'));
    }

    public function update(Discount $discount)
    {
        $discount->update(
            request()->validate([
                'name' => 'required|min:3',
                'code' => ['required', Rule::unique('discounts')->ignore($discount->id)],
                'product_id' => 'required',
                'value' => 'required|min:0|max:100',
                'begin_date' => 'required',
                'end_date' => 'required',
            ])
        );
        return response('تخفیف ویرایش شد');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return back()->with('flash', 'تخفیف حذف شد');
    }
}
