<?php

namespace Tests\Feature;

use App\Models\Produc;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $data = [
            'name' => 'duplek',
            'category' => 1
        ];
        $response = $this->actingAs($user)->withSession(['banned' => false])->post('/Product/create', $data);

        $product = collect(Produc::where('name', 'duplek')->get());

        $response->assertStatus(200);
        $this->assertTrue($product->isNotEmpty());
    }
}
