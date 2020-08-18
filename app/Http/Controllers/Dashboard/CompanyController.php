<?php

namespace App\Http\Controllers\Dashboard;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(100);

        return view('dashboard.companies.index',[
            'companies' => $companies
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'passengerCount' => 'required',
            'busNumber' => 'required'
        ]);

        Company::create([
            'name' => $request->name,
            'passengerCount' => $request->passengerCount,
            'busNumber' => $request->busNumber,
        ]);

        \Session::flash('success' , 'تمت اضافة شركة النقل بنجاح');
        return back();
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('dashboard.companies.edit',[
            'company' => $company
        ]);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        if($request->has('name')){
            $company->name = $request->name;
        }
        if($request->has('passengerCount')){
            $company->passengerCount = $request->passengerCount;
        }
        if($request->has('busNumber')){
            $company->busNumber = $request->busNumber;
        }

        $company->save();

        \Session::flash('success' , 'تم تعديل شركة النقل بنجاح');
        return redirect()->route('companies.index');
    }


    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        
        \Session::flash('success' , 'تم حذف شركة النقل بنجاح');
        return back();

    }
}
