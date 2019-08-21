<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ajaxCities(Request $request)
    {
        $state_id = $request->state_id;
        $cities = City::where('parent_id', '=', $state_id)->get();
        return response()->json($cities);
    }
}
