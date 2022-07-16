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
            'name' => 'karton'
        ];
        $response = $this->actingAs($user)->withSession(['banned' => false])->post('/Category/create', $data);

        $response->assertStatus(200);

        $category = Category::where('name', 'karton');

        $this->assertNotEmpty($category);
    }
}
