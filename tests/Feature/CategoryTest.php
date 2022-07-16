<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_createCategory()
    {
        $user = User::get('email', 'admin@gmail.com')->first();

        $data = [
            'name' => 'makanan'
        ];

        $response = $this->actingAs($user)->withSession(['banned' => false])->post('/Category/create', $data);

        $response->assertStatus(200);

        $category = collect(Category::where('name', 'makanan')->get());

        $this->assertTrue($category->isNotEmpty());
    }





    public function test_edit()
    {
        $user = User::get('email', 'admin@gmail.com')->first();

        $data = [
            'name' => 'karton'
        ];

        $code = collect(Category::get());
        $code =  $code->first()->code;
        $response = $this->actingAs($user)->withSession(['banned' => false])->post("/Category/edit/$code", $data);

        $response->assertStatus(200);

        $category = collect(Category::where('name', 'karton')->get());

        $this->assertTrue($category->isNotEmpty());
    }




    public function test_delete()
    {
        $user = User::get('email', 'admin@gmail.com')->first();

        $code = collect(Category::get())->first();
        $code = $code->code;
        $response = $this->actingAs($user)->withSession(['banned' => false])->delete("/Category/delete/$code");

        $response->assertStatus(200);
    }
}
