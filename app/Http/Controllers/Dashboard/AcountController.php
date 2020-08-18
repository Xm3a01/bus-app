<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcountController extends Controller
{
    public function index()
    {
        $account = User::FindOrFail(\Auth::user()->id);

        return view('dashboard.accounts.edit',[
            'account' => $account
        ]);
    }

    public function update(Request $request , $id)
    {
        $account = User::FindOrFail($id);

        if($request->has('name')){
            $account->name = $request->name;
        }
        if($request->has('email')){
            $account->email = $request->email;    
        }
        if($request->has('phone')){
            $account->phone = $request->phone;  
        }
        if($request->has('password') && $request->password !=''){
            $account->password = \Hash::make($request->password);  
        }
        $account->save();
        \Session::flash('success' , 'تم تعديل الحساب بنجاح');
        return redirect('/dashboard');

    }
}
