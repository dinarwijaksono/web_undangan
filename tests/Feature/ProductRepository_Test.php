<?php

namespace Tests\Feature;

use App\Domain\Product_domain;
use App\Repository\BodyProduct_repository;
use App\Repository\Product_repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductRepository_Test extends TestCase
{
    public $productDomain;
    public $productRepository;
    public $bodyProductRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->productDomain = $this->app->make(Product_domain::class);

        $this->productRepository = $this->app->make(Product_repository::class);
        $this->bodyProductRepository = $this->app->make(BodyProduct_repository::class);

        config(['database.default' => 'mysql-test']);
    }

    public function test_add()
    {
        $product = $this->productDomain;
        $product->name = 'aku-kamu-' . mt_rand(1, 999);
        $product->code = 'P' . mt_rand(1, 9999999);
        $product->category_id = 1;
        $product->price = 100000;
        $product->link_locate_demo = 'aku-kamu-' . mt_rand(1, 999);

        $this->productRepository->create($product);

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'code' => $product->code,
            'price' => $product->price
        ]);
    }



    public function test_getByCode()
    {
        $product = $this->productDomain;
        $product->name = 'aku-kamu-' . mt_rand(1, 999);
        $product->code = 'P' . mt_rand(1, 9999999);
        $product->category_id = 1;
        $product->price = 100000;
        $product->link_locate_demo = 'aku-kamu-' . mt_rand(1, 999);

        $this->productRepository->create($product);

        $id = $this->productRepository->getIdByCode($product->code);

        $this->assertIsInt($id);
        $this->assertDatabaseHas('products', [
            'id' => $id,
            'code' => $product->code,
            'name' => $product->name,
        ]);
    }


    public function test_getByName()
    {
        $product = $this->productDomain;
        $product->name = 'aku-kamu-' . mt_rand(1, 999);
        $product->code = 'P' . mt_rand(1, 9999999);
        $product->category_id = 1;
        $product->price = 100000;
        $product->link_locate_demo = 'aku-kamu-' . mt_rand(1, 999);
        $product->body = "<div>lorem ipsum</div>";

        $this->productRepository->create($product);
        $product->id = $this->productRepository->getIdByCode($product->code);
        $this->bodyProductRepository->create($product);

        $response = $this->productRepository->getByName($product->name);

        $this->assertIsObject($response);
        $this->assertEquals($response->name, $product->name);
        $this->assertEquals($response->code, $product->code);
        $this->assertEquals($response->category_id, $product->category_id);
        $this->assertEquals($response->body, $product->body);
    }


    public function test_delete()
    {
        $product = $this->productDomain;
        $product->name = 'aku-kamu-' . mt_rand(1, 999);
        $product->code = 'P' . mt_rand(1, 9999999);
        $product->category_id = 1;
        $product->price = 100000;
        $product->link_locate_demo = 'aku-kamu-' . mt_rand(1, 999);

        $this->productRepository->create($product);

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'code' => $product->code
        ]);

        $this->productRepository->delete($product->code);

        $this->assertDatabaseMissing('products', [
            'name' => $product->name,
            'code' => $product->code
        ]);
    }
}
