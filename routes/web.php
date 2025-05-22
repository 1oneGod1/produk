<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::get('/products/edit/{id}', 'edit')->name('products.edit');
    Route::post('/products/store', 'store')->name('products.store');
    Route::post('/products/update/{id}', 'update')->name('products.update');
    Route::get('/products/show/{id}', 'show')->name('products.show');
    Route::post('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

});
