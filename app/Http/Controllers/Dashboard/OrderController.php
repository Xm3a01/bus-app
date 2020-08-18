<?php

namespace App\Http\Controllers\Dashboard;

use App\City;
use App\User;
use App\Order;
use App\Ticket;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::paginate(100);
        $tickets = Ticket::all();
        $companies = Company::all();
        $cities = city::all();
        $clients = User::role('client')->get();
        return view('dashboard.orders.index',[
            'orders' => $orders,
            'tickets' => $tickets,
            'clients' => $clients,
            'companies' => $companies,
            'cities' => $cities
        ]);
    }

    public function store(Request $request)
    {
        // return 'from => '.$request->from.'  To =>  '.$request->to.'  company =>  '.$request->company.' | '.$request->date;
        $ticket = Ticket::where('from',$request->from)->where('to',$request->to)->where('company_id',$request->company)->where('date',$request->date)->first();
        if($ticket){
            Order::create([
                'Company' => $ticket->company->name,
                'price' => $request->price,
                'from' => $ticket->fromCity->name,
                'to' => $ticket->toCity->name,
                'numberOfperson' => $request->numberOfperson,
                'date' => $request->date,
                'hourNumber' => $request->hourNumber,
                'user_id' => $request->user_id,

            ]);
            $message = 'تم انشاء طلب بنجاح';
           \Session::flash('success',$message);
        } else {
            $message = 'There is no journy from '.City::find($request->from)->name .' to '.City::find($request->to)->name.'or no company Bus';
           \Session::flash('error',$message);
        }

        return redirect()->route('orders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
