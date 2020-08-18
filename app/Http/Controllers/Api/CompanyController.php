<?php

namespace App\Http\Controllers\Api;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class CompanyController extends Controller
{

    public function companies()
    {
        $companies = Company::all();
        return response()->json(['companies' => $companies, 'code' => 200]);
    }

   
}
