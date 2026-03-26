<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


// Public Controller
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


// Product Controller
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');


// Admin Controller
Route::prefix('admin')
  ->middleware(['auth', 'admin'])
  ->group(function () {

    // Admin Product Controller
    Route::get('/products', [AdminProductController::class, 'index'])
      ->name('admin.products.index');

    Route::get('/products/create', [AdminProductController::class, 'create'])
      ->name('admin.products.create');

    Route::post('/products', [AdminProductController::class, 'store'])
      ->name('admin.products.store');

    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])
      ->name('admin.products.edit');

    Route::put('/products/{product}', [AdminProductController::class, 'update'])
      ->name('admin.products.update');

    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])
      ->name('admin.products.destroy');

    Route::patch('/products/{product}/toggle', [AdminProductController::class, 'toggle'])
      ->name('admin.products.toggle');

    // Admin Category Controller
    Route::get('/categories', [CategoryController::class, 'index'])
      ->name('admin.categories.index');

    Route::get('/categories/create', [CategoryController::class, 'create'])
      ->name('admin.categories.create');

    Route::post('/categories', [CategoryController::class, 'store'])
      ->name('admin.categories.store');

    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
      ->name('admin.categories.edit');

    Route::put('/categories/{category}', [CategoryController::class, 'update'])
      ->name('admin.categories.update');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
      ->name('admin.categories.destroy');
  });


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
