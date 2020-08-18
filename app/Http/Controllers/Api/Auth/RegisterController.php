<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\Traits\ApiAuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use ApiAuthenticatesUsers;
    
    public function register(Request $request)
    {
        $error = Validator::make($request->all() , [
            'email'=> 'email|unique:users',
            'password' => 'min:8|confirmed'
        ]);
        if($error->fails()){   
            return response()->json(['error'=>$error->messages(),'code' =>401]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'altPhone' => $request->altPhone,
            'gender' => $request->gender
        ]);
         $user->assignRole('client');
         return $this->apilogin($request);
    }
}
