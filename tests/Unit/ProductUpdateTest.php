<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;

class ProductUpdateTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function product_edit_screen_can_be_rendered()
    {
        $product = Product::first();

        $response = $this->get(route('product.edit', $product->id));

        $response->assertStatus(200);
    }

    /** @test */
    public function product_update()
    {
        $product = Product::first();

        Storage::fake('avatars');

        $response = $this->put(route('product.update', $product->id), [
            'name' => $this->faker->name,
            'price' => $this->faker->randomNumber(4),
            'image' => UploadedFile::fake()->image('avatar.jpg')
        ]);
       
        $response->assertStatus($response->status(), 200);
    }

    /** @test */
    public function name_must_be_required()
    {
        $product = Product::first();

        $response = $this->post(route('product.update', $product->id), [
            'name' => ''
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function name_must_be_string()
    {
        $product = Product::first();

        $response = $this->post(route('product.update', $product->id), [
            'name' => '1234'
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function price_must_be_required()
    {
        $product = Product::first();

        $response = $this->post(route('product.update', $product->id), [
            'price' => ''
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function price_must_be_integer()
    {
        $product = Product::first();

        $response = $this->post(route('product.update', $product->id), [
            'price' => 'string'
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function image_must_be_required()
    {
        $product = Product::first();

        $response = $this->post(route('product.update', $product->id), [
            'image' => ''
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function image_must_be_png_jpg_type()
    {
        $product = Product::first();

        $response = $this->post(route('product.update', $product->id), [
            'image' => UploadedFile::fake()->create('test.csv'),
        ]);
       
        $response->assertStatus($response->status(), 422);
    }
}
