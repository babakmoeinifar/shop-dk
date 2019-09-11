<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeField;
use App\AttributeGroup;
use App\Category;
use App\City;
use App\Discount;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        $product = Product::orderby('PID', 'desc')->get();
        $products = Product::get();
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
        $products = product::where('category_id', $categoryId)->orderby('id','desc')->get();

        return view('site.category_list' , compact('products', 'categoryId'));
    }

    public function product($category,$productId)
    {
        $product = Product::findOrFail($productId);
        dd($product->name);
    }
}
