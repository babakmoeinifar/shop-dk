<?php

namespace App\Http\Controllers\Admin;

use App\AttributeGroup;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    public function addAttrGroup()
    {
        request()->validate(
            [
                'attr_group_name' => 'required|min:3|unique:attribute_groups',
                'category_id' => 'required',
            ]);

        $attr_group = AttributeGroup::create([
           'attr_group_name' => request('attr_group_name'),
           'category_id' => request('category_id'),
        ]);
        return $attr_group;
    }
}
