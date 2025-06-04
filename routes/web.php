<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route halaman awal
Route::view('/', 'welcome');

// Group route untuk fitur produk
Route::controller(ProductController::class)->group(function () {
    // Daftar produk
    Route::get('/products', 'index')->name('products.index');
    // Form tambah produk
    Route::get('/products/create', 'create')->name('products.create');
    // Form edit produk
    Route::get('/products/edit/{id}', 'edit')->name('products.edit');
    // Proses simpan produk
    Route::post('/products/store', 'store')->name('products.store');
    // Proses update produk
    Route::post('/products/update/{id}', 'update')->name('products.update');
    // Detail produk
    Route::get('/products/show/{id}', 'show')->name('products.show');
    // Hapus produk
    Route::post('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

});
