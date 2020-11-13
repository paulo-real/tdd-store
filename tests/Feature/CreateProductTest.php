<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    protected $model = Product::class;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAuthenticatedUserCanCreateProducts()
    {
        $this->auth();

        $product = Product::factory()->make();

        $response = $this->post(
            '/api/product',
            $product->toArray()
        )
        ->assertStatus(201);

        $this->assertDatabaseHas($this->table, [
            'name' => $product->name,
            'description' => $product->description,
        ]);
    }
}
