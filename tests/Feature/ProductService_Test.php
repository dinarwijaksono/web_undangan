<?php

namespace Tests\Feature;

use App\Domain\Product_domain;
use App\Repository\BodyProduct_repository;
use App\Repository\Product_repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\Product_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductService_Test extends TestCase
{
    private $productDomain;

    private $productRepository;
    private $bodyProductRepository;

    private $productService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productDomain = $this->app->make(Product_domain::class);

        $this->productRepository = $this->app->make(Product_repository::class);
        $this->bodyProductRepository = $this->app->make(BodyProduct_repository::class);

        $this->productService = $this->app->make(Product_service::class);

        config(['database.default' => 'mysql-test']);
    }



    public function test_addSuccess()
    {
        $request = new Request();
        $request['name'] = "aku kamu " . mt_rand(1, 99999);
        $request['price'] = 100_000;
        $request['category_id'] = 1;
        $request['body'] = '<div>Aku ' . mt_rand(1, 9999) . ' kamu</div>';

        $this->productService->add($request);

        $this->assertDatabaseHas('products', [
            'name' => $request['name'],
            'price' => $request['price'],
            'category_id' => $request['category_id']
        ]);

        $this->assertDatabaseHas('body_products', [
            'body' => $request['body']
        ]);
    }



    // public function test_updateFailed()
    // {
    //     $product = DB::table('products')->select('code', 'name', 'price', 'category_id')->get();
    //     $product = $product->first();

    //     $name = $product->name;
    //     $price = $product->price;
    //     $category_id = $product->category_id;

    //     $result = $this->product_service->update($product->code, $name, $price, $category_id);

    //     $this->assertFalse($result);
    // }

    // public function test_updateNameIsExist()
    // {
    //     $product = DB::table('products')->select('code', 'name', 'price', 'category_id')->get();
    //     $product = $product->first();

    //     $name = 'Tema 3';
    //     $price = $product->price;
    //     $category_id = $product->category_id;

    //     $result = $this->product_service->update($product->code, $name, $price, $category_id);

    //     $this->assertFalse($result);
    // }


    // public function test_updateSuccess()
    // {
    //     $product = DB::table('products')->select('code', 'name', 'price', 'category_id')->get();
    //     $product = $product->first();

    //     $name = 'Tema 70';
    //     $price = 25000;
    //     $category_id = $product->category_id;

    //     $result = $this->product_service->update($product->code, $name, $price, $category_id);

    //     $this->assertTrue($result);
    // }




    // public function test_deleteFailed()
    // {
    //     $result = $this->product_service->delete('lkasdf');

    //     $this->assertFalse($result);
    // }

    public function test_deleteSuccess()
    {
        $request = new Request();
        $request['name'] = "aku kamu " . mt_rand(1, 99999);
        $request['price'] = 100_000;
        $request['category_id'] = 1;
        $request['body'] = '<div>Aku ' . mt_rand(1, 9999) . ' kamu</div>';

        $this->productService->add($request);

        $response = $this->productService->getByName($request->name);

        $this->assertEquals($request->name, $request->name);
        $this->assertEquals($request->category_id, $request->category_id);
        $this->assertEquals($request->body, $request->body);

        $this->productService->delete($response->code);

        $this->assertDatabaseMissing('products', [
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        $this->assertDatabaseMissing('body_products', [
            'body' => $request->body
        ]);
    }
}
