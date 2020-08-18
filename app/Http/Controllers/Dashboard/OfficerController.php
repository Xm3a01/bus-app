<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficerController extends Controller
{

    public function index()
    {
        $officers = User::role('officer')->paginate(100);
        
        return view('dashboard.officers.index',[
            'officers' => $officers
        ]);
    }

 

    public function edit($id)
    {
        $officer = User::FindOrFail($id);
        return view('dashboard.officers.edit',[
            'officer' => $officer
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' =>\Hash::make($request->password)
        ]);
        $user->assignRole('officer');

        \Session::flash('success' , 'تم حفظ الموظف بنجاح');
        return redirect()->route('officers.index');
    }


    public function update(Request $request, $id)
    {
        // return $request->password;
        $officer = User::findOrFail($id);
        if($request->has('name')){
            $officer->name = $request->name;
        }
        if($request->has('email')){
            $officer->email = $request->email;
        }
        if($request->has('phone')){
            $officer->phone = $request->phone;
        }
        if($request->has('password') && $request->paasword != ''){
            $officer->password = \Hash::make($request->password);
        }

        $officer->save();

        \Session::flash('success' , 'تم تعديل الموظف بنجاح');
        return redirect()->route('officers.index');
        
        
    }

    public function destroy($id)
    {
        $officer = User::findOrFail($id);
        $officer->delete();
        \Session::flash('success' , 'تم تعديل الموظف بنجاح');
        return redirect()->route('officers.index');
    }
}
