<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [ProductController::class, 'index']);

Route::get('/products/{id}',
    [ProductController::class, 'show']);

Route::get('/cart',
    [CartController::class, 'index']);

Route::post('/cart/add',
    [CartController::class, 'add']);

Route::get('/checkout',
    [CheckoutController::class, 'index']);

Route::post('/order/submit',
    [OrderController::class, 'submit']);