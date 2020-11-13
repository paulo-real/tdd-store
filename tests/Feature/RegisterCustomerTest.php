<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterCustomerTest extends TestCase
{
    protected $model = Customer::class;

    /** @test */
    public function testGuestCanSelfRegisterAsCustomer()
    {
        $customer = Customer::factory()->make();

        $response = $this->post(
            '/api/customer',
            $customer->toArray()
        )
        ->assertStatus(201);

        $this->assertDatabaseHas($this->table, [
            'name' => $customer->name,
            'cpf' => $customer->cpf,
        ]);
    }
}
