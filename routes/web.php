<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/products/{id}',
    [ProductController::class, 'show']);

Route::get('/cart',
    [CartController::class, 'index']);

Route::post('/cart/add',
    [CartController::class, 'add']);

Route::post('/cart/update', 
    [CartController::class, 'update']);

Route::post('/cart/remove', 
    [CartController::class, 'remove']);

Route::post('/cart/clear', 
    [CartController::class, 'clear']);

Route::get('/checkout',
    [CheckoutController::class, 'index']);

Route::post('/order/submit',
    [OrderController::class, 'submit']);

Route::get('/order/confirmation/{purchaseNo}', 
    [OrderController::class, 'confirmation'])->name('order.confirmation');