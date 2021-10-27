<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('Backend.order.index', compact('orders'));
    }

    function makeOrderOnGoing(Order $id)
    {
        $id->status = 'ongoing';
        $id->save();
        session()->flash('success', 'Order Status Changed!!');
        return back();
    }

    function makeOrderReceived(Order $id)
    {
        $id->status = 'received';
        $id->save();
        session()->flash('success', 'Order Status Changed!!');
        return back();
    }
}
