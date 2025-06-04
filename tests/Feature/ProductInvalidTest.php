<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductInvalidTest extends TestCase
{
    /**
     * Ensure invalid product id returns 404.
     */
    public function test_edit_invalid_product_returns_404(): void
    {
        $response = $this->get('/products/edit/999');
        $response->assertStatus(404);
    }
}
