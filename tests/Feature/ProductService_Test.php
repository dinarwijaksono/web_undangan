<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\Product_service;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductService_Test extends TestCase
{
    private $product_service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->product_service = $this->app->make(Product_service::class);
    }



    public function test_addSuccess()
    {
        $name = 'tema ' . mt_rand(1, 99);
        $result = $this->product_service->add($name, 100_000, 1);

        $this->assertTrue($result);

        $this->assertDatabaseHas('products', ['name' => $name]);
    }



    public function test_updateFailed()
    {
        $product = DB::table('products')->select('code', 'name', 'price', 'category_id')->get();
        $product = $product->first();

        $name = $product->name;
        $price = $product->price;
        $category_id = $product->category_id;

        $result = $this->product_service->update($product->code, $name, $price, $category_id);

        $this->assertFalse($result);
    }

    public function test_updateNameIsExist()
    {
        $product = DB::table('products')->select('code', 'name', 'price', 'category_id')->get();
        $product = $product->first();

        $name = 'Tema 3';
        $price = $product->price;
        $category_id = $product->category_id;

        $result = $this->product_service->update($product->code, $name, $price, $category_id);

        $this->assertFalse($result);
    }


    public function test_updateSuccess()
    {
        $product = DB::table('products')->select('code', 'name', 'price', 'category_id')->get();
        $product = $product->first();

        $name = 'Tema 70';
        $price = 25000;
        $category_id = $product->category_id;

        $result = $this->product_service->update($product->code, $name, $price, $category_id);

        $this->assertTrue($result);
    }




    public function test_deleteFailed()
    {
        $result = $this->product_service->delete('lkasdf');

        $this->assertFalse($result);
    }

    public function test_deleteSuccess()
    {
        $product = DB::table('products')->get();
        $product = $product->first();

        $result = $this->product_service->delete($product->code);

        $this->assertTrue($result);
    }
}
