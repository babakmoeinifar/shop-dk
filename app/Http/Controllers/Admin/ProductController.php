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
        if (request('image')) {
            $name = time() . '.'
                . explode('/',
                    explode(':',
                        substr(request('image'), 0,
                            strpos(request('image'), ';')))[1])[1];

            Image::make(request('image'))->resize(540, 420)->encode('webp')->save(public_path('images/products/') . $name);
            request()->merge(['image' => 'images/products/' . $name]);
        }

        $product = Product::create(
            request()->validate([
                'name' => 'required',
                'category_id' => 'required',
                'code' => 'nullable',
                'price' => 'required',
                'stock' => 'required',
                'unit' => 'required',
                'country' => 'required',
                'desc' => 'nullable',
                'image' => 'required',
                'meta_keywords' => 'nullable',
            ])
        );

        return $product;
    }
}
