<?php

use App\Http\Controllers\Frontend\Auth\{
    AuthenticatedSessionController,
    RegisteredUserController,
    SocialLoginController
};
use App\Http\Controllers\Frontend\{
    CartController,
    CompareController,
    ContactController,
    CouponController,
    HomeController,
    OrderController,
    ProductController,
    ReviewController,
    SettingsController,
    ShippingController,
    ShopController,
    WishlistController,
    MessageController
};
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

# Sorting
Route::get('sorting/{query}', [ShopController::class, 'sortingProduct'])->name('sorting');


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

    # compare
    Route::post('compare', [CompareController::class, 'store'])->name('compare');
    Route::get('compare', [CompareController::class, 'index'])->name('compare');
    Route::delete('compare/{compare}', [CompareController::class, 'destroy'])->name('compare.destroy');

    # Settings
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [SettingsController::class, 'updateInformation'])->name('settings');
    Route::get('password', [SettingsController::class, 'password'])->name('password');
    Route::post('password', [SettingsController::class, 'updatePassword'])->name('password');


    Route::get('/dashboard', function () {
        $navItem = 'dashboard';
        return view('Frontend.dashboard', compact('navItem'));
    })->name('dashboard');

    # Message
    Route::get('message', [MessageController::class, 'index'])->name('message');
    Route::post('message', [MessageController::class, 'store'])->name('message');
    Route::post('reply/{message}', [MessageController::class, 'storeReply'])->name('reply');
});

# Contact
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact');



Route::get('test', function () {

    return Storage::get('public/pdf/23.pdf');
    return view('Frontend.cart.shipping');
});
require __DIR__ . '/admin_auth.php';
require __DIR__ . '/admin.php';



Route::get('nexmo', function () {
    $customers =  Customer::hasPhoneNumber()->get(['name', 'phone']);
    foreach ($customers as $customer) {
        $client = $customer->name;
        $phone_number = strlen($customer->phone) == 11 ? "+88{$customer->phone}" : $customer->phone;
        $url = config('app.url');
        $app_name = config('app.name');
        $text = "Happy birthday to a very cherished client ({$client}). May you live a trouble-free and perfectly happy life. Visit our site [{$url}]";
        $basic  = new \Vonage\Client\Credentials\Basic("1763bb57", "hrqFFzag8vDw6CXI");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($phone_number, $app_name, $text)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
});
