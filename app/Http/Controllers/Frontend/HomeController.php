<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data = [];
        $data['sliders'] = Slider::latest()->get();
        $data['categories'] = Category::with('products')->latest()->get();
        $data['latest_products'] = Product::latest()->take(8)->get();
        return view('welcome', $data);
    }
}