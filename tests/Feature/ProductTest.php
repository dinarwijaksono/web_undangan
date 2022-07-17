<?php

namespace Tests\Feature;

use App\Models\Product;
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

        $product = collect(Product::where('name', 'duplek')->get());

        $response->assertStatus(200);
        $this->assertTrue($product->isNotEmpty());
    }



    public function test_edit()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $data = [
            'name' => 'jamur',
            'category' => 2
        ];

        $code = collect(Product::get())->first();
        $code = $code->code;
        $response = $this->actingAs($user)->withSession(['banned' => false])->post("/Product/edit/$code", $data);

        $product = collect(Product::where('code', $code)->get())->first();

        $response->assertStatus(200);
        $this->assertEquals($product->name, 'jamur');
    }



    public function test_delete()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $code = collect(Product::get())->first();
        $code = $code->code;
        $response = $this->actingAs($user)->withSession(['banned' => false])->delete("/Product/delete/$code");

        $response->assertStatus(200);
    }
}
