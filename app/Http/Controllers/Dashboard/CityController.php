<?php

namespace App\Http\Controllers\Dashboard;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
   
    public function index()
    {
        $cities = City::paginate(100);
        return view('dashboard.cities.index',[
            'cities' => $cities
        ]);
    }

    public function create()
    {
        return view('dashboard.cities.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
        ]);

        City::create([
            'name' => $request->name
           ]);

        \Session::flash('success' , 'تمت اضافة المدينه  بنجاح');
        return redirect()->route('cities.index');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);

        return view('dashboard.cities.edit',[
            'city' => $city
        ]);
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        
        if($request->has('name')){
            $city->name = $request->name;
        }

        $city->save();

        \Session::flash('success' , 'تم تعديل المدينه  بنجاح');
        return redirect()->route('cities.index');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        
        \Session::flash('success' , 'تم حذف المدينه  بنجاح');
        return redirect()->route('cities.index');

    }
}
