<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Mendefinisikan state default model.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Menghasilkan nama kategori produk yang unik
            'name' => $this->faker->unique()->word(),
        ];
    }
}
