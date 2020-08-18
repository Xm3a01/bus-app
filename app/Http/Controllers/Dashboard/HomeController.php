<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Order;
use App\Ticket;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        $orders = Order::all();
        $companies = Company::all();
        $users = User::role('client')->get();

        return view('dashboard.home',[
            'tickets' => $tickets,
            'orders' => $orders,
            'companies' => $companies,
            'users' => $users
        ]);
    }
}
