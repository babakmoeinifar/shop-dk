<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderbyDesc('id')->get();
        if (request()->wantsJson()) {
            return $brands;
        }
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store()
    {
        if (request('image')) {
            $name = time() . '.'
                . explode('/',
                    explode(':',
                        substr(request('image'), 0,
                            strpos(request('image'), ';')))[1])[1];

            Image::make(request('image'))->resize(500, 500)->encode('webp')->save(public_path('images/brands/') . $name);
            request()->merge(['image' => 'images/brands/' . $name]);
        }

        $brand = Brand::create(
            request()->validate([
                'name' => 'required',
                'en_name' => 'required',
                'category_id' => 'required',
                'product_id' => 'required',
                'country' => 'required',
                'image' => 'required',
            ])
        );

        return $brand;
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('flash', 'برند حذف شد');
    }

}
