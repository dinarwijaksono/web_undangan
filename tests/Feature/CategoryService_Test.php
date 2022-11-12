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
    }



    public function test_addCategory()
    {
        $response = $this->category_service->addCategory('Romantis');

        $this->assertTrue($response);

        $this->assertDatabaseHas('categories', ['name' => 'Romantis']);
    }


    public function test_getSuccess()
    {
        $categori = DB::table('categories')->select('code')->get();
        $categori = collect($categori)->first();
        $code = $categori->code;

        $result = $this->category_service->get($code);

        $this->assertEquals($result->count(), 1);
    }


    public function test_getFailed()
    {
        $code = '';

        $result = $this->category_service->get($code);

        // var_dump($result);

        $this->assertTrue($result->isEmpty());
    }



    public function test_getAll()
    {
        $response = $this->category_service->getAll();
        $response = collect($response);

        $this->assertTrue($response->isNotEmpty());
    }



    public function test_deleteSuccess()
    {
        $response = $this->category_service->delete('C4964647');

        $this->assertTrue($response);
        $this->assertDatabaseMissing('categories', ['code' => 'C4964647']);
    }
}
