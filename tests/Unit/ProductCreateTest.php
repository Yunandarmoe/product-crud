<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;

class ProductCreateTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function product_create_screen_can_be_rendered()
    {
        $response = $this->get(route('product.create'));

        $response->assertStatus(200);
    }

    /** @test */
    public function product_create()
    {
        Storage::fake('avatars');

        $response = $this->post(route('product.store'), [
            'name' => $this->faker->name,
            'price' => $this->faker->randomNumber(4),
            'image' => UploadedFile::fake()->image('avatar.jpg')
        ]);
       
        $response->assertStatus($response->status(), 200);
    }

    /** @test */
    public function name_must_be_required()
    {
        $response = $this->post(route('product.store'), [
            'name' => ''
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function name_must_be_string()
    {
        $response = $this->post(route('product.store'), [
            'name' => '1234'
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function price_must_be_required()
    {
        $response = $this->post(route('product.store'), [
            'price' => ''
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function price_must_be_integer()
    {
        $response = $this->post(route('product.store'), [
            'price' => 'string'
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function image_must_be_required()
    {
        $response = $this->post(route('product.store'), [
            'image' => ''
        ]);
       
        $response->assertStatus($response->status(), 422);
    }

    /** @test */
    public function image_must_be_png_jpg_type()
    {
        $response = $this->post(route('product.store'), [
            'image' => UploadedFile::fake()->create('test.csv'),
        ]);
       
        $response->assertStatus($response->status(), 422);
    }
}
