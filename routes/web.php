<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/admin_auth.php';
require __DIR__ . '/admin.php';
