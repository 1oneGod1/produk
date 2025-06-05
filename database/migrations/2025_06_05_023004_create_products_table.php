<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel produk.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Kolom ID utama
            $table->string('name'); // Nama produk
            $table->text('description'); // Deskripsi produk
            $table->decimal('price', 10, 2); // Harga produk
            $table->foreignId('product_category_id') // ID kategori produk
                  ->constrained() // Relasi ke tabel kategori produk
                  ->onDelete('cascade'); // Hapus produk jika kategori dihapus
            $table->string('photo')->nullable(); // Path foto produk
            $table->timestamps(); // Waktu pembuatan dan pembaruan
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel produk.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
