<?php

namespace App;

use DB;

class Helper
{

    public static function attribute($id)
    {
        $attr = AttributeProduct::where('product_id', $id)->first();
        if ($attr) {
            $id1 = $attr->attribute_id;
            return Attribute::find($id1)->name;
        }
    }

    public static function item($id)
    {
        $attr = AttributeFieldProduct::where('product_id', $id)->first();
        if ($attr) {
            $id1 = $attr->attribute_field_id;
            return AttributeField::find($id1)->attr_field_name;
        }
    }





    public static function ShowImage($id)
    {
        $image = ImageProduct::where('product_id', $id)->get();
        foreach ($image as $images) {
            $img = image::find($images->image_id);
            echo "<li><img src='/productimage/$img->image' class='showimage'></li>";
        }
    }

    public static function brand($id)
    {
        $brand = Brand::where('product_id', $id)->first();
        if ($brand) {
            return $brand->name;
        }
    }

    public static function attributes($id)
    {
        $attr = AttributeProduct::where('product_id', $id)->get();
        foreach ($attr as $attrs) {
            $attr1 = Attribute::find($attrs->attribute_id);
            echo "<li>$attr1->name2</li>";
        }
    }

    public static function items($id)
    {
        $item = DB::table('attributeitem_product as a')->where('product_id', $id)
            ->join('attributeitems as a1', 'a.attributeitem_id', '=', 'a1.id')
            ->join('attributes as a2', 'a1.attribut_id', '=', 'a2.id')->get();

        if ($item) {
            foreach ($item as $items) {
                $attr1 = AttributeField::find($items->attributeitem_id);
                echo "<li>  <span>$items->name2</span> <span>$attr1->name1</span> </li>";
            }
        }
    }

    public static function mortabet($id)
    {
        $group = AttributeGroup::where('category_id', $id)->first();
        $product = Product::where('category_id', $group->category_id)->get();
        foreach ($product as $products) {
            echo "  <li>
                                <img src='/imagepro/$products->productimage' width='210px' height='210px'>
                                <span class='text'>$products->productname</span>
                                <span class='price'> $products->priceتومان </span>
                            </li>";
        }
    }

}



