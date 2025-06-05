<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel kategori produk.
     */
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id(); // Kolom ID utama
            $table->string('name')->unique(); // Kolom nama kategori, harus unik
            $table->timestamps(); // Kolom untuk mencatat waktu pembuatan dan pembaruan
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel kategori produk.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
