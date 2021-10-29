<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function singleProduct(Product $product)
    {
        $product->load('reviews');
        $related_products = Product::Similar($product->category_id)->inRandomOrder()->take(4)->get();
        return view('singleProduct', compact('product', 'related_products'));
    }

    public function dynamicSearch($query)
    {
        return Product::where('name', 'like', "%$query%")->get(['name', 'slug']);
    }
}
