<?php

namespace App\Http\Controllers\Dashboard;

use App\City;
use App\Ticket;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    
    public function index()
    {

        $tickets = Ticket::paginate(100);
        $tickets->load(['company','fromCity','toCity']);
        $cities = City::all();
        $companies = Company::all();

        return view('dashboard.tickets.index',[
            'tickets' => $tickets,
            'cities' => $cities,
            'companies' => $companies
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request ,[
            'company_id' => 'required',
            'fromCity_id' => 'required',
            'toCity_id' => 'required',
            'date' => 'required',
            'emptySeating' => 'required',
            'price' => 'required',
            'hourNumber' => 'required' 
            
        ]);

        Ticket::create([
            'company_id' => $request->company_id,
            'from' => $request->fromCity_id,
            'to' => $request->toCity_id,
            'date' => $request->date,
            'emptySeating' => $request->emptySeating,
            'price' => $request->price,
            'hourNumber' => $request->hourNumber,
        ]);

        \Session::flash('success' , 'تمت اضافة التذكره بنجاح');
        return redirect()->route('tickets.index');
        }

   
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $cities = City::all();
        $companies = Company::all();

        return view('dashboard.tickets.edit',[
            'ticket' => $ticket,
            'cities' => $cities,
            'companies' => $companies
        ]);
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        if($request->has('company_id')){
            $ticket->company_id = $request->company_id;
        }
        if($request->has('fromCity_id')){
            $ticket->from = $request->fromCity_id;
        }
        if($request->has('toCity_id')){
            $ticket->to = $request->toCity_id;
        }
        if($request->has('date')){
            $ticket->date = $request->date;
        }
        if($request->has('emptySeating')){
            $ticket->emptySeating = $request->emptySeating;
        }
        if($request->has('price')){
            $ticket->price = $request->price;
        }
        if($request->has('hourNumber')){
            $ticket->hourNumber = $request->hourNumber;
        }
        $ticket->save();
        \Session::flash('success' , 'تم تعديل التذكره بنجاح');
        return redirect()->route('tickets.index');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        \Session::flash('success' , 'تم حذف التذكره بنجاح');
        return redirect()->route('tickets.index');
    }
}
