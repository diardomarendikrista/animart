<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

// Route untuk Halaman Utama (Home)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Group Route untuk Products berdasarkan '/products' dan Controller 'ProductController'
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('products');
    Route::get('/create', 'create')->name('products.create');
    Route::get('/edit/{id}', 'edit')->name('products.edit');
    Route::post('/store', 'store')->name('products.store');
    Route::post('/update/{id}', 'update')->name('products.update');
    Route::get('/show/{id}', 'show')->name('products.show');
    Route::delete('/destroy/{id}', 'destroy')->name('products.destroy');
    Route::post('/reset', 'reset')->name('products.reset');
});
