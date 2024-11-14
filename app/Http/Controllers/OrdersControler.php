<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrdersControler extends Controller
{
    function list(){
        return view("orders-list", ["orders" => Order::paginate(10)]);
    }

    function detail($id){
        return view("orders-detail", ["order" => Order::find($id)]);
    }

    function createForm(){
        return view("orders-create", ["customers" => Customer::all()]);
    }
    
    function create(Request $request){

        $order = new Order();
        $order->orderNumber = $request->input("orderNumber");
        $order->status = $request->input("status");
        $order->orderDate = $request->input("orderDate");
        $order->requiredDate = '2004-10-19';
        $order->comments = $request->input("comments");
        $order->customerNumber = $request->input("customerNumber");
        $order->save();
    
        
        $customer = Customer::find($request->input("customerNumber"));

        $payment = new Payment();
        $payment->checkNumber = $request->input("checkNumber");
        $payment->paymentDate = $request->input("paymentDate");
        $payment->amount = $request->input("amount");

        $customer->payments()->save($payment);
    
    }
    
    
   
}
