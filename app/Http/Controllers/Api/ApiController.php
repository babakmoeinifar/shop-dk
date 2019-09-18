<?php

namespace App\Http\Controllers\Api;

use App\Attribute;
use App\AttributeField;
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
        return Product::where('pro_category_id', $categoryId)->get();
    }

    public function productFilter()
    {
        $products = \DB::table('products')
            ->where('pro_category_id', request('category'))
            ->leftJoin('brands', 'products.id', '=', 'brands.product_id')
            ->leftjoin('attribute_field_product', 'products.id', '=', 'attribute_field_product.product_id')
            ->leftjoin('attribute_fields', 'attribute_field_product.attribute_field_id', '=', 'attribute_fields.id')
            ->paginate(4);

//        $products = Product::where('category_id', $categoryId)->get();
//        $brands = Brand::whereIn('product_id', $products->map->id)->get();
//        foreach ($brands as $brand) {
//            $pros[] = Product::where(['id' => $brand->product_id])->first();
//        }

        $reponse = [
            'pagination' => [
            'total' => $products->total(),
            'per_page' => $products->perPage(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
            'from' => $products->firstItem(),
            'to' => $products->lastPage()
        ],
            'data' => $products
        ];

        return response()->json($reponse);
    }

    public function showBrand($categoryId)
    {
        return Brand::where('category_id', $categoryId)->get();
    }

    public function AttrsByProduct()
    {
        return Attribute::orderByDesc('id')->get();
    }

    public function AttrFieldsByAttr()
    {
        return AttributeField::orderByDesc('id')->get();
    }
}
