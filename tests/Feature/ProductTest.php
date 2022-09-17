<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_success()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();
        $name = $this->faker('id_ID')->text(10);
        $category = collect(Category::all())->first()->id;

        $data = [
            'name' => $name,
            'price' => 100000,
            'category' => $category
        ];

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/Product/create', $data);;

        $response->assertStatus(200);
        $response->assertValid(['name', 'price', 'category']);
        $this->assertDatabaseHas('products', ['name' => $name, 'price' => 100000, 'category_id' => $category]);
    }


    public function test_create_failed()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();
        $name = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos, consectetur officiis, ratione ipsa doloribus, enim quia omnis ad eligendi optio facilis.';
        $category = collect(Category::all())->first()->id;

        $data = [
            'name' => $name,
            'price' => NULL,
            'category' => $category
        ];

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/Product/create', $data);

        $response->assertInvalid(['name', 'price']);
        $response->assertValid(['category']);
        $this->assertDatabaseMissing('products', ['name' => $name]);
    }



    public function test_update_success()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();
        $name = $this->faker('id_ID')->text(20);
        $category = collect(Category::all())->first()->id;

        $code = collect(Product::all())->first()->code;

        $data = [
            'name' => $name,
            'price' => 150000,
            'category' => $category
        ];

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post("/Product/edit/$code", $data);

        $response->assertStatus(200);
        $response->assertValid(['name', 'price', 'category']);
        $this->assertDatabaseHas('products', ['name' => $name, 'price' => 150000, 'category_id' => $category]);
    }



    public function test_update_failed()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();
        $name = $this->faker('id_ID')->text(25);
        $category = collect(Category::all())->first()->id;

        $code = collect(Product::all())->first()->code;

        $data = [
            'name' => $name,
            'price' => 150000,
            'category' => $category
        ];

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post("/Product/edit/$code", $data);

        $response->assertInvalid(['name']);
        $response->assertvalid(['price', 'category']);
        $this->assertDatabaseMissing('products', ['name' => $name]);
    }







    public function test_delete()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $code = collect(Product::all())->pop()->code;

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->delete("/Product/delete/$code");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('products', ['code' => $code]);
    }
}
