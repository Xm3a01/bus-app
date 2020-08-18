<?php

namespace App\Http\Controllers\Api;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::all();
        $tickets->load(['company','fromCity','toCity']);
        return response()->json(['tickets' => $tickets, 'code' => 200]);

    }

    public function get(Request $request)
    {
        $tickets = Ticket::where('from',$request->from)->where('to',$request->to)->get();
        $tickets->load(['company','fromCity','toCity']);
        return response()->json(['tickets' => $tickets, 'code' => 200]);

    }
}
