<?php

use App\Http\Controllers\Frontend\Auth\{
    AuthenticatedSessionController,
    RegisteredUserController,
    SocialLoginController
};
use App\Http\Controllers\Frontend\{
    CartController,
    CouponController,
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

# Coupon
Route::post('coupon', [CouponController::class, 'checkCouponIsValid'])->name('coupon');
Route::delete('coupon', [CouponController::class, 'removeCoupon'])->name('coupon');

# auth
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

# Social Login
Route::get('/auth/redirect/{provider}', [SocialLoginController::class, 'login'])->name(('social.login'));
Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('social.callback');

Route::get('test', function () {
    return view('Frontend.cart.shipping');
});

Route::get('/dashboard', function () {
    return view('Frontend.dashboard');
})->name('dashboard');


require __DIR__ . '/admin_auth.php';
require __DIR__ . '/admin.php';
