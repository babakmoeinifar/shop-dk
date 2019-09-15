<?php

namespace App\Http\Controllers\Api;

use App\Attribute;
use App\AttributeGroup;
use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;

class ApiController extends Controller
{
    public function attributeGroups()
    {
        return AttributeGroup::orderByDesc('id')->get();
    }

    public function attributes()
    {
        return Attribute::orderByDesc('id')->get();
    }

    public function productByCategory($categoryId)
    {
        return Product::where('category_id', $categoryId)->get();
    }

    public function showBrand($categoryId)
    {
        return Brand::where('category_id', $categoryId)->get();
    }
}
