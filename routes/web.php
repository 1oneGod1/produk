<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;

// Route untuk halaman beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Group route untuk produk
Route::controller(ProductController::class)
    ->prefix('products') // Prefix URL untuk semua route produk
    ->name('products.')  // Prefix nama untuk semua route produk
    ->group(function () {
        // Route untuk menampilkan daftar produk
        Route::get('/', 'index')->name('index');             // route('products.index')
        
        // Route untuk menampilkan form pembuatan produk
        Route::get('/create', 'create')->name('create');     // route('products.create')
        
        // Route untuk menyimpan produk baru
        Route::post('/store', 'store')->name('store');       // route('products.store')
        
        // Route untuk menampilkan form edit produk berdasarkan ID
        Route::get('/edit/{id}', 'edit')->name('edit');      // route('products.edit')
        
        // Route untuk memperbarui produk berdasarkan ID
        Route::post('/update/{id}', 'update')->name('update'); // route('products.update')
        
        // Route untuk menampilkan detail produk berdasarkan ID
        Route::get('/show/{id}', 'show')->name('show');      // route('products.show')

        // Route untuk menghapus produk berdasarkan ID
        Route::delete('/destroy/{id}', 'destroy')->name('destroy'); // route('products.destroy')
    });

// Group route untuk kategori
Route::controller(ProductCategoryController::class)
    ->prefix('categories') // Prefix URL untuk semua route kategori
    ->name('categories.')  // Prefix nama untuk semua route kategori
    ->group(function () {
        // Route untuk menampilkan daftar kategori
        Route::get('/', 'index')->name('index');             // route('categories.index')
        
        // Route untuk menampilkan form pembuatan kategori
        Route::get('/create', 'create')->name('create');     // route('categories.create')
        
        // Route untuk menyimpan kategori baru
        Route::post('/store', 'store')->name('store');       // route('categories.store')
        
        // Route untuk menampilkan form edit kategori berdasarkan ID
        Route::get('/edit/{id}', 'edit')->name('edit');      // route('categories.edit')
        
        // Route untuk memperbarui kategori berdasarkan ID
        Route::post('/update/{id}', 'update')->name('update'); // route('categories.update')
        
        // Route untuk menghapus kategori berdasarkan ID
        Route::delete('/destroy/{id}', 'destroy')->name('destroy'); // route('categories.destroy')
    });
