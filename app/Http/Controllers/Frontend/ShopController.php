<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        // return $data['products'] = Product::withOnly('popularProducts')->latest()->paginate(9);
        $data['colors'] = Color::with('products:color_id')->latest()->get(['name', 'slug', 'id']);
        $data['sizes'] = Size::with('products:size_id')->latest()->get(['name', 'slug', 'id']);

        if ($request->has('query')) {

            // return  $request->input('query');
            $data['products'] = Product::Sorting($request->input('query'))->withOnly('info')->paginate(9);
        } else {

            $data['products'] = Product::withOnly('info')->latest()->paginate(9);
        }

        return view('shop', $data);
    }

    public function sortingProduct($query)
    {
        return $query;
    }
}
