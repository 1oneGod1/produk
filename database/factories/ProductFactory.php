<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Menghasilkan nama produk acak yang terdiri dari dua kata
            'name' => $this->faker->words(2, true),
            
            // Menghasilkan kalimat acak untuk deskripsi produk
            'description' => $this->faker->sentence(),
            
            // Menghasilkan harga acak antara 10.000 dan 200.000
            'price' => $this->faker->numberBetween(10000, 200000),
            
            // Menentukan ID kategori produk secara acak, atau membuat kategori baru jika tidak ada
            'product_category_id' => ProductCategory::inRandomOrder()->first()?->id ?? ProductCategory::factory()->create()->id,
        ];
    }
}
