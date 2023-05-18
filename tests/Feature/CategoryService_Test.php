<?php

namespace Tests\Feature;

use App\Services\Category_service;
use Hamcrest\Type\IsObject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CategoryService_Test extends TestCase
{
    private $category_service;

    public function setUp(): void
    {
        parent::setUp();

        $this->category_service = $this->app->make(Category_service::class);

        config(['database.default' => 'mysql-test']);
    }



    public function test_addCategory()
    {
        $name = 'Romantis' . mt_rand(1, 999);

        $response = $this->category_service->addCategory($name);

        $this->assertTrue($response);

        $this->assertDatabaseHas('categories', ['name' => $name]);
    }


    public function test_getSuccess()
    {
        $this->category_service->addCategory('category-' . mt_rand(1, 9999));

        $category = DB::table('categories')->select('code', 'name')->first();

        $response = $this->category_service->get($category->code);

        $this->assertEquals($category->code, $response->code);
        $this->assertEquals($category->name, $response->name);
    }


    public function test_getFailed()
    {
        $code = 'code yang tidak ada';

        $response = $this->category_service->get($code);

        // var_dump($response);

        $this->assertTrue(is_null($response));
    }



    public function test_getAll()
    {
        $response = $this->category_service->getAll();
        $response = collect($response);

        $this->assertTrue($response->isNotEmpty());
    }



    public function test_deleteSuccess()
    {
        $this->category_service->addCategory('contoh-' . mt_rand(1, 999999));

        $category = DB::table('categories')->select('name', 'code')->first();

        $this->category_service->delete($category->code);

        $this->assertDatabaseMissing('categories', [
            'code' => $category->code,
            'name' => $category->name
        ]);
    }
}
