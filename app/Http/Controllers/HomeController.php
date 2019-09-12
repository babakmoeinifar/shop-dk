<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeField;
use App\AttributeGroup;
use App\Brand;
use App\Category;
use App\City;
use App\Discount;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderby('id', 'desc')->get();
        $groups = AttributeGroup::orderby('id', 'desc')->get();
        $newProducts = Product::orderby('created_at', 'desc')->get();
        $discounts = Discount::orderby('id', 'desc')->get();

        return view('site.index', compact('products', 'newProducts', 'groups', 'discounts'));
    }

    public function ajaxCities(Request $request)
    {
        $state_id = $request->state_id;
        $cities = City::where('parent_id', '=', $state_id)->get();
        return response()->json($cities);
    }

    public function category($categoryId)
    {
        $this_category = Category::findOrFail($categoryId);
        $main_category = Category::where('id', $this_category->parent_id)->first();
        $zero_category = $main_category ? Category::where('id', $main_category->parent_id)->first() : null;

        $products = product::where('category_id', $categoryId)->orderby('id', 'desc')->get();
        $brands = Brand::all();
        $attrs = Attribute::all();
        $attributeFields = AttributeField::all();

        return view('site.category_list', compact('products', 'this_category', 'main_category', 'zero_category', 'brands','attrs', 'attributeFields'));
    }

    public function product($category, $productId)
    {
        $product = Product::findOrFail($productId);
        dd($product->name);
    }
}
