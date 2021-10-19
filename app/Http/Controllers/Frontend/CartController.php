<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart(Request $request, Product $product)
    {
        Cart::add([
            'id' => $product->id,
            'qty' => $request->quantity,
            'price' => $product->info->sell_price,
            'name' => $product->name,
            'weight' => 0,
            'options' => [
                'image' => $product->image,
            ]
        ]);
        session()->flash('success', 'Product added to  Cart!');
        return back();
    }
}
