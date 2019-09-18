<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderByDesc('id')->get();
        if (request()->wantsJson()) {
            return $products;
        }
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store()
    {
        if (request('pro_image')) {
            $name = time() . '.'
                . explode('/',
                    explode(':',
                        substr(request('pro_image'), 0,
                            strpos(request('pro_image'), ';')))[1])[1];

            Image::make(request('pro_image'))->resize(500, 500)->encode('webp')->save(public_path('images/products/') . $name);
            request()->merge(['pro_image' => 'images/products/' . $name]);
        }

        $product = Product::create(
            request()->validate([
                'pro_name' => 'required',
                'pro_category_id' => 'required',
                'code' => 'nullable',
                'price' => 'required',
                'stock' => 'required',
                'unit' => 'required',
                'country' => 'required',
                'desc' => 'nullable',
                'pro_image' => 'required',
                'meta_keywords' => 'nullable',
            ])
        );

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('flash', 'محصول حذف شد');
    }

    public function addImagesProduct(Request $request)
    {
        if (request('id')) {
            $product = Product::findOrFail(request('id'));

            $image = new \App\Image();
            $filename = rand(1111, 99999) . '.' . 'webp';
            $image_path = 'images/products/extra/' . $filename;
            Image::make($request->file('file'))->resize(500, 500)->encode('webp')->save($image_path);

            $image->path = $image_path;
            $image->save();

            $image = \App\Image::find($image->id);
            return $product->images()->attach($image->id);
        } else {
            return response('ابتدا یک محصول ثبت نمایید', 400);
        }

    }
}
