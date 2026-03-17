<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


// Public Controller
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


// Product Controller
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');


// Cart Controller
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/checkout', [CartController::class, 'checkout'])
  ->middleware('auth')
  ->name('cart.checkout');


// Order Controller
Route::get('/my-orders', [OrderController::class, 'index'])
  ->middleware('auth')
  ->name('orders.index');
Route::get('/my-orders/{order}', [OrderController::class, 'show'])
  ->middleware('auth')
  ->name('orders.show');
