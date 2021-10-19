<?php

use App\Http\Controllers\Frontend\{
    CartController,
    HomeController,
    ProductController,
    ShopController
};

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('product/{product}', [ProductController::class, 'singleProduct'])->name('single-product');

# Cart
Route::post('add-to-cart/{product}', [CartController::class, 'addToCart'])->name('add-to-cart');



Route::get('/cart', function () {
    return view('cart');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/admin_auth.php';
require __DIR__ . '/admin.php';
