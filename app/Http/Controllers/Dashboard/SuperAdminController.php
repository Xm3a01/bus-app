<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{

    public function index()
    {
        $superAdmin = User::role('super-admin')->first();

        return view('dashboard.accounts.edit',[
            'account' => $superAdmin
        ]);
    }

    public function edit($id)
    {
        $admin = User::findOrFail(\Auth::user()->id);

        return view('dashboard.accounts.edit',[
            'account' => $admin
        ]);
    }

    public function update(Request $request, $id)
    {
        $superAdmin = User::role('super-admin')->first();
        if($request->has('name')){
            $superAdmin->name = $request->name;
        }
        if($request->has('email')){
            $superAdmin->email = $request->password;
            
        }
        if($request->has('password')){
            $superAdmin->passeord = \Hash::make($request->name);
            
        }
        $superAdmin->save();
    }
}
