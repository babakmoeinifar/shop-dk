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
        $menu = Category::where('parent_id', 0)->get();
        $submenu = Category::where('parent_id', '!=', 0)->get();

//        $product = Product::orderby('PID', 'desc')->get();
        $product = Product::get();
        $group = AttributeGroup::orderby('id', 'desc')->get();
        $newp = Product::orderby('created_at', 'desc')->get();
        $discount = Discount::orderby('id', 'desc')->get();
        $attribute = Attribute::orderby('id', 'desc')->get();
        $item = AttributeField::orderby('id', 'desc')->get();
        return view('site.index', compact('menu', 'submenu', 'product', 'newp', 'group', 'attribute', 'item', 'discount'));
    }

    public function ajaxCities(Request $request)
    {
        $state_id = $request->state_id;
        $cities = City::where('parent_id', '=', $state_id)->get();
        return response()->json($cities);
    }
}
