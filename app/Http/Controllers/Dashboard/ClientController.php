<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    
    public function index()
    {
        $clients = User::role('client')->paginate(100);

        return view('dashboard.clients.index',[
            'clients' => $clients
        ]);
    }

    public function edit($id)
    {
        $client = User::FindOrFail($id);
        return view('dashboard.clients.edit',[
            'client' => $client
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
            'altPhone' => $request->altPhone,
            'gender' => $request->gender,
            'password' =>\Hash::make($request->password)
        ]);
        $user->assignRole('client');

        \Session::flash('success' , 'تم حفظ العميل بنجاح');
        return redirect()->route('clients.index');
    }


    public function update(Request $request, $id)
    {
        $client = User::findOrFail($id);
        if($request->has('name')){
            $client->name = $request->name;
        }
        if($request->has('email')){
            $client->email = $request->email;
        }
        if($request->has('phone')){
            $client->phone = $request->phone;
        }
        if($request->has('altPhone')){
            $client->altPhone = $request->altPhone;
        }
        if($request->has('gender')){
            $client->gender = $request->gender;
        }
        if($request->has('password') && $request->paasword != ''){
            $client->password = \Hash::make($request->password);
        }

        $client->save();

        \Session::flash('success' , 'تم تعديل العميل بنجاح');
        return redirect()->route('clients.index');
        
        
    }

    public function destroy($id)
    {
        $client = User::findOrFail($id);
        $client->delete();
        \Session::flash('success' , 'تم تعديل العميل بنجاح');
        return redirect()->route('clients.index');
    }
}
