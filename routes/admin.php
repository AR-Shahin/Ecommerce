<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    SizeController,
    ColorController,
    SliderController,
    ProductController,
    WebsiteController,
    CategoryController,
    CouponController,
    DashboardController,
    SubCategoryController
};


// Route::get('test', fn () => view('Backend.Category.test'));

Route::prefix('admin')->as('admin.')->middleware(['auth:admin'])->group(function () {

    # Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class)->except(['create', 'edit']);
    Route::get('fetch-category', [CategoryController::class, 'fetchCategory'])->name('fetch-category');

    Route::resource('sub-category', SubCategoryController::class)->except(['create', 'edit']);
    Route::get('fetch-sub-category', [SubCategoryController::class, 'fetchSubCategory'])->name('fetch-sub-category');

    Route::resource('color', ColorController::class)->except(['create', 'edit']);
    Route::get('fetch-color', [ColorController::class, 'fetchColor'])->name('fetch-color');

    Route::resource('size', SizeController::class)->except(['create', 'edit']);
    Route::get('fetch-size', [SizeController::class, 'fetchSize'])->name('fetch-size');

    Route::resource('product', ProductController::class);
    Route::get('get-sub-category-by-category/{id}', [ProductController::class, 'getSubCategoryByCategory'])->name('get-sub-cat-by-cat');

    Route::resource('slider', SliderController::class)->except(['create', 'edit']);
    Route::get('fetch-slider', [SliderController::class, 'fetchSlider'])->name('fetch-slider');

    Route::resource('website', WebsiteController::class)->except(['create', 'store', 'destroy', 'show']);

    Route::resource('coupon', CouponController::class)->except(['create', 'edit']);
    Route::get('fetch-coupon', [CouponController::class, 'fetchCoupon'])->name('fetch-coupon');
});
