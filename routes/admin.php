<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SubCategoryController;

Route::get('test', fn () => view('Backend.Category.test'));

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
});
