<?php

namespace App\Http\Controllers\Api;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class CityController extends Controller
{
   
        public function cities()
        {
            $cities = City::all();
            return response()->json(['cities' => $cities, 'code' => 200]);

        }
}
