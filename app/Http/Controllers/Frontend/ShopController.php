<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;

class ShopController extends Controller
{
    public function shop()
    {

        $data['colors'] = Color::with('products:color_id')->latest()->get(['name', 'slug', 'id']);
        $data['sizes'] = Size::with('products:size_id')->latest()->get(['name', 'slug', 'id']);
        $data['products'] = Product::withOnly('info')->latest()->paginate(9);

        return view('shop', $data);
    }
}
