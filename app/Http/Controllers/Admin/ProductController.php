<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function store()
    {
        dd(request()->all());
        Product::create(
            request()->validate([
                'name' => 'required',
                'category_id' => 'required',
                'code' => 'nullable',
                'price' => 'required',
                'stock' => 'required',
                'desc' => 'nullable',
                'image' => 'nullable',
                'meta_keywords' => 'nullable',
            ])
        );

//        Image::make(request()->file('image'))->resize(540, 420)->encode('webp')->save(request('image'));

        return response('کالا ایجاد شد');
    }

    public function addImageProduct()
    {
        $filename = rand(1111, 99999) . '.' . 'webp';
        return 'images/products/' . $filename;
    }
}
