<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Notifications\OrderRequest;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{

    public function all($id)
    {
        $user = User::findOrfail($id);
        $orders = $user->orders;
        return response()->json(['orders' => $orders, 'code' => 200]);

    }


    public function store(Request $request)
    {
        $order = Order::create([
            'Company'=>$request->Company,
            'from' => $request->from,
            'to' =>$request->to,
            'price' => $request->price,
            'numberOfperson' =>$request->numberOfperson,
            'date' => $request->date,
            'accept' => $request->accept,
            'user_id' => JWTAuth::user()->id
        ]);

        $user = JWTAuth::user();
        $admins = User::all();

        Notification::send($admins , new OrderRequest($user));

        return response()->json(['order' => $order , 'code' => 200]);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json(['order' => $order , 'code' => 200]);
    }


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Order delete successfuly' , 'code' => 200]);
    }
}
