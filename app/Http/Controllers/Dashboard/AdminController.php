<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::role('admin')->paginate(100);
        return view('dashboard.admins.index',[
            'admins' => $admins
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' =>\Hash::make($request->password)
        ]);
        $user->assignRole('admin');

        \Session::flash('success' , 'تم حفظ المشرف بنجاح');
        return redirect()->route('admins.index');
    }

    
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('dashboard.admins.edit',[
            'admin' => $admin
        ]);
    }


    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        if($request->has('name')){
            $admin->name = $request->name;
        }
        if($request->has('email')){
            $admin->email = $request->email;
        }
        if($request->has('phone')){
            $admin->phone = $request->phone;
        }
        if($request->has('password') && $request->paasword != ''){
            $admin->password = \Hash::make($request->password);
        }

        $admin->save();

        \Session::flash('success' , 'تم تعديل المشرف بنجاح');
        return redirect()->route('admins.index');
        
        
    }

    public function destroy($id)
    {
        $admins = User::findOrFail($id);
        $admin->delete();
        \Session::flash('success' , 'تم تعديل المشرف بنجاح');
        return redirect()->route('admins.index');
    }
}
