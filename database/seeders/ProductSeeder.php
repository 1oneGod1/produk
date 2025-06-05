<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada kategori produk sebelum membuat produk
        if (ProductCategory::count() === 0) {
            ProductCategory::factory()->count(3)->create();
        }

        // Membuat 30 produk secara otomatis menggunakan factory
        Product::factory()->count(30)->create();
    }
}
