<?php

namespace App\Http\Controllers\Api;

use App\AttributeGroup;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function attributeGroups()
    {
        return AttributeGroup::orderByDesc('id')->get();
    }
}
