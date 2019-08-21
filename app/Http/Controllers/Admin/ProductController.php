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
        Product::create(
            request()->validate([
                'name' => 'required',
                'category_id' => 'required',
                'code' => 'nullable',
                'price' => 'required',
                'stock' => 'required',
                'unit' => 'required',
                'country' => 'required',
                'desc' => 'nullable',
                'image' => 'nullable',
                'meta_keywords' => 'nullable',
            ])
        );


        return response('کالا ایجاد شد');
    }

    public function addImageProduct()
    {
        return $file = request()->all();
//        $filename = rand(1111, 99999) . '.' . 'webp';
//        Image::make(request()->file('image'))->resize(540, 420)->encode('webp')->save($file);

//        return 'images/products/' . $filename;

    }
}
