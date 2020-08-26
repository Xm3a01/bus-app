<?php

namespace App\Traits;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

trait  ApiAuthenticatesUsers
{
    public function apiLogin($request)
    {
        // try {
        //     auth()->userOrFail();
        //     return response()->json([$objectName=>$object]);
        // } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
        //     return response()->json(['errors'=>$errors]);
        // }

        $crads =  $request->only(['email','password']);
        if(!$token = JWTAuth::attempt($crads)){
            return response()->json(['error'=>'incorrect email/password',401]);
        }    
        return response()->json(['token'=>$token , 'code' => 200]);
    }

    public function apiLogout($request)
    {
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'message' => 'User logged out successfully',
                'code' => 200
                ]);
        } catch (JWTException $e) {

            return response()->json([
                'message' => 'Oops , this user can not be logged out !',
                'code' => 500
                ]);
        }
    }
}