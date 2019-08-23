<?php

namespace App\Http\Controllers\Api;

use App\Attribute;
use App\AttributeGroup;
use App\Http\Controllers\Controller;

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
}
