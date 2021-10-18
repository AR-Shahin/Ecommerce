<?php

namespace App\Http\Controllers\Admin;

use App\Actions\File;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::withOnly(['info', 'category'])->latest()->get();
        return view('Backend.Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get(['name', 'id']);
        $colors = Color::latest()->get(['name', 'id']);
        $sizes = Size::latest()->get(['name', 'id']);
        return view('Backend.Product.create', compact('categories', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return count($request->file('slider_images'));
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'sub_cat_id' => $request->sub_cat_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
        ]);
        if ($product) {
            $product->info()->create([
                'price' => $request->price,
                'sell_price' => $request->sell_price,
                'is_featured' => $request->is_featured ? true : false,
                'image' => File::upload($request->file('image'), 'product')
            ]);
            foreach ($request->file('slider_images') as $image) {
                $product->sliders()->create([
                    'image' => File::upload($image, 'product/slider')
                ]);
            }
        }
        session()->flash('success', 'Role Updated Successfully!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Backend.Product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getSubCategoryByCategory($category_id)
    {
        return SubCategory::whereCategoryId($category_id)->get();
    }
}