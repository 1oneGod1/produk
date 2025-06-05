<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk mengisi database aplikasi.
     */
    public function run()
    {
        // Memanggil seeder untuk kategori produk dan produk
        $this->call([
            ProductCategorySeeder::class, // Seeder untuk kategori produk
            ProductSeeder::class,        // Seeder untuk produk
        ]);
    }
}
