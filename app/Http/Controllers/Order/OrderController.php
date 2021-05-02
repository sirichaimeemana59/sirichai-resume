<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order\OrderModel;

class OrderController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $order = array(
            ['id_user' => '226','id_food'=>'1','price'=>20,'amount'=>'2','order_number'=>'1'],
            ['id_user' => '226','id_food'=>'1','price'=>20,'amount'=>'2','order_number'=>'1'],
            ['id_user' => '226','id_food'=>'1','price'=>20,'amount'=>'2','order_number'=>'1'],
        );

        $total_amount=0;

        foreach ($order as $value){
            $total_amount += $value['price'];
        }

        foreach ($order as $value){
            $order_user = new OrderModel();
            $order_user->order_number = 001;
            $order_user->id_user = $value['id_user'];
            $order_user->id_food = $value['id_food'];
            $order_user->price = $value['price'];
            $order_user->amount = $value['amount'];
            $order_user->total_amount = $total_amount;
            $order_user->save();
        }
       // print_r($order_user);

        return response()->json($order);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
