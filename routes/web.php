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
    OrderController,
    ProductController,
    ReviewController,
    ShippingController,
    ShopController,
    WishlistController
};

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('product/{product}', [ProductController::class, 'singleProduct'])->name('single-product');
Route::get('search-product/{query}', [ProductController::class, 'dynamicSearch'])->name('dynamic-search');
Route::get('/category-product/{slug}', [ProductController::class, 'categoryWiseProducts'])->name('category-product');
Route::get('/sub-category-product/{slug}', [ProductController::class, 'subCategoryWiseProducts'])->name('sub-category-product');


# Cart
Route::post('cart/{product}', [CartController::class, 'addToCart'])->name('add-to-cart');


Route::middleware('cart')->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
    Route::delete('/cart/{id}', [CartController::class, 'removeSingleItem'])->name('cart.remove_single');
    Route::put('/cart/{id}', [CartController::class, 'updateSingleItem'])->name('cart.update_single');
});

# Coupon
Route::post('coupon', [CouponController::class, 'checkCouponIsValid'])->name('coupon');
Route::delete('coupon', [CouponController::class, 'removeCoupon'])->name('coupon');

# auth
Route::middleware('guest:customer')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
});


# Social Login
Route::get('/auth/redirect/{provider}', [SocialLoginController::class, 'login'])->name(('social.login'));
Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('social.callback');

# Shipping
Route::middleware(['auth:customer', 'cart'])->group(function () {
    Route::get('shipping', [ShippingController::class, 'shipping'])->name('shipping');
    Route::post('shipping', [ShippingController::class, 'storeShippingAndOrder'])->name('shipping');
});


Route::middleware('auth:customer')->group(function () {
    # Order
    Route::get('orders', [OrderController::class, 'index'])->name('orders');
    Route::get('order-details/{id}', [OrderController::class, 'getOrderDetails'])->name('order_details');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    # Review
    Route::post('review', [ReviewController::class, 'store'])->name('review');

    # Wishlist
    Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist');
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::delete('wishlist/{wishlist}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');



    Route::get('/dashboard', function () {
        $navItem = 'dashboard';
        return view('Frontend.dashboard', compact('navItem'));
    })->name('dashboard');
});






Route::get('test', function () {
    return view('Frontend.cart.shipping');
});
require __DIR__ . '/admin_auth.php';
require __DIR__ . '/admin.php';
