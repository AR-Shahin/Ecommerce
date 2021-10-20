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
Route::post('cart/{product}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
Route::delete('/cart/{id}', [CartController::class, 'removeSingleItem'])->name('cart.remove_single');
Route::put('/cart/{id}', [CartController::class, 'updateSingleItem'])->name('cart.update_single');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/admin_auth.php';
require __DIR__ . '/admin.php';
