<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('test', fn () => view('Backend.Category.test'));

Route::prefix('admin')->as('admin.')->middleware(['auth:admin'])->group(function () {

    # Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class)->except(['create', 'edit']);
    Route::get('fetch-category', [CategoryController::class, 'fetchCategory'])->name('fetch-category');
});
