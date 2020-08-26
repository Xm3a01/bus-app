<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Controller;

class UserController extends Controller
{
   public function index()
   {
      return response()->json(['user'=>JWTAuth::user() , 'code' => 200 ]);
   }
    public function update($id , Request $request)
    {
        $user = User::findOrFail($id);
            if($request->has('name')){
               $user->name = $request->name;
            }
            if($request->has('email')){
               $user->email = $request->email;
            }
            if($request->has('password')){
               $user->password = Hash::make($request->password);
            }
            if($request->has('phone')){
              $user->phone = $request->phone;
            }
            if($request->has('altPhone')){
               $user->altPhone = $request->altPhone;
            }
            if($request->has('gender')){
              $user->gender = $request->gender;
            }

            $user->save();
        
        return response()->json(['user' => $user , 'code' => 200]);
    }
}
