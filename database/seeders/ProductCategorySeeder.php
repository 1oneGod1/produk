<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk mengisi tabel kategori produk.
     */
    public function run()
    {
        // Daftar nama kategori produk yang akan dimasukkan ke database
        $names = ['Elektronik', 'Pakaian', 'Makanan'];
        
        // Iterasi setiap nama kategori dan buat entri di tabel ProductCategory
        foreach ($names as $name) {
            ProductCategory::create(['name' => $name]);
        }
    }
}
