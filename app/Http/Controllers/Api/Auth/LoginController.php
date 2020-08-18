<?php

namespace App\Http\Controllers\Api\Auth;

use App\Traits\ApiAuthenticatesUsers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use ApiAuthenticatesUsers;
    
    public function login(Request $request)
    {
        return $this->apiLogin($request);      
    }

    public function logout(Request $request)
    {
        $error = Validator::make($request->all() , [
            'token'=> 'required',
        ]);
        if($error->fails()){   
            return response()->json(['error'=>$error->messages(),'code' =>401]);
        }
        return $this->apiLogout($request);
    }
}
