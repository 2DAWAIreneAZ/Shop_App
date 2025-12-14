<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ValorationController;

// Página principal
Route::get('/', [MainController::class, 'index'])->name('main');

// StyleController
Route::get('/styles', [StyleController::class, 'index'])->name('styles.index');
Route::get('/styles/create', [StyleController::class, 'create'])->name('styles.create');
Route::post('/styles', [StyleController::class, 'store'])->name('styles.store');
Route::get('/styles/{style}', [StyleController::class, 'show'])->name('styles.show');
Route::get('/styles/{style}/edit', [StyleController::class, 'edit'])->name('styles.edit');
Route::put('/styles/{style}', [StyleController::class, 'update'])->name('styles.update');
Route::delete('/styles/{style}', [StyleController::class, 'destroy'])->name('styles.destroy');

// ProductController
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// ValorationController
Route::get('/valorations', [ValorationController::class, 'index'])->name('valorations.index');
Route::get('/valorations/create', [ValorationController::class, 'create'])->name('valorations.create');
Route::post('/valorations', [ValorationController::class, 'store'])->name('valorations.store');
Route::get('/valorations/{valoration}', [ValorationController::class, 'show'])->name('valorations.show');
Route::get('/valorations/{valoration}/edit', [ValorationController::class, 'edit'])->name('valorations.edit');
Route::put('/valorations/{valoration}', [ValorationController::class, 'update'])->name('valorations.update');
Route::delete('/valorations/{valoration}', [ValorationController::class, 'destroy'])->name('valorations.destroy');
Route::delete('/valorations/{product}', [ValorationController::class, 'destroy'])->name('valorations.destroy');
