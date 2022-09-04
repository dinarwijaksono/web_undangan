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

    use WithFaker;

    public function test_create_success()
    {

        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $name = $this->faker('id_ID')->text(14);

        $data = [
            'name' => $name
        ];
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/Category/create', $data);

        $response->assertValid(['name']);
        $this->assertTrue(collect(Category::where('name', $name)->get())->isNotEmpty());
    }


    public function test_create_failed()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $data = [
            'name' => ''
        ];
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/Category/create', $data);

        $response->assertInValid(['name']);
    }




    public function test_update_success()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $code = collect(Category::all())->pop()->code;
        $data['name'] = $this->faker('id_ID')->text(10) . ' Baru';

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post("/Category/edit/$code", $data);

        $response->assertValid(['name']);
        $this->assertDatabaseHas('categories', ['name' => $data['name']]);
    }


    public function test_update_failed()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $code = collect(Category::all())->pop()->code;
        $data['name'] = $this->faker('id_ID')->text(40);

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post("/Category/edit/$code", $data);

        $response->assertInvalid(['name']);
        $this->assertDatabaseMissing('categories', ['name' => $data['name']]);
    }



    public function test_delete()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $code = collect(Category::all())->pop()->code;

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->delete("/Category/delete/$code");

        $this->assertDatabaseMissing('categories', ['code' => $code]);
    }
}
