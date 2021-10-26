<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingController extends Controller
{
    public function shipping()
    {
        return view('Frontend.cart.shipping');
    }

    public function storeShippingAndOrder(Request $request)
    {
        return $request->all();
    }
}
