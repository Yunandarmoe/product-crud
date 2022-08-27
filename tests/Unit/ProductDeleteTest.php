<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;

class ProductDeleteTest extends TestCase
{
    /** @test */
    public function product_delete()
    {
        $product = Product::first();

        $response = $this->delete(route('product.destroy', $product->id));
       
        $response->assertStatus($response->status(), 200);
    }
}
