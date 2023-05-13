<?php

namespace Tests\Feature;

use App\Domain\Product_domain;
use App\Models\Product;
use App\Repository\BodyProduct_repository;
use App\Repository\Category_repository;
use App\Repository\Product_repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductRepository_Test extends TestCase
{
    public $productDomain;

    public $categoryRepository;
    public $productRepository;
    public $bodyProductRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->productDomain = $this->app->make(Product_domain::class);

        $this->categoryRepository = $this->app->make(Category_repository::class);
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
        // create category
        $categoryCode = 'C' . mt_rand(1, 9999999);
        $categoryName = 'category-' . mt_rand(1, 99999);

        $this->categoryRepository->create($categoryCode, $categoryName);

        $this->assertDatabaseHas('categories', [
            'code' => $categoryCode,
            'name' => $categoryName
        ]);

        $category = $this->categoryRepository->getByName($categoryName);


        // create product and body product
        $product = $this->productDomain;
        $product->name = 'aku-kamu-' . mt_rand(1, 999);
        $product->code = 'P' . mt_rand(1, 9999999);
        $product->category_id = $category->id;
        $product->price = 25000;
        $product->link_locate_demo = 'aku-kamu-' . mt_rand(1, 999);
        $product->body = "<div>aaa</div>";

        $this->productRepository->create($product);
        $product->id = $this->productRepository->getIdByCode($product->code);
        $this->bodyProductRepository->create($product);

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'code' => $product->code,
            'price' => $product->price
        ]);

        $this->assertDatabaseHas('body_products', [
            'product_id' => $product->id,
            'body' => $product->body
        ]);

        // get by code
        $response = $this->productRepository->getByCode($product->code);

        $this->assertEquals($product->name, $response->name);
        $this->assertEquals($product->price, $response->price);
        $this->assertEquals($categoryName, $response->category_name);
        $this->assertEquals($product->category_id, $response->category_id);
        $this->assertEquals($product->link_locate_demo, $response->link_locate_demo);
        $this->assertEquals($product->body, $response->body);
    }


    public function test_getByName()
    {
        // create category
        $categoryCode = 'C' . mt_rand(1, 9999999);
        $categoryName = 'category-' . mt_rand(1, 99999);

        $this->categoryRepository->create($categoryCode, $categoryName);

        $category = $this->categoryRepository->getByName($categoryName);

        $this->assertDatabaseHas('categories', [
            'code' => $categoryCode,
            'name' => $categoryName
        ]);

        // create product and body product
        $product = $this->productDomain;
        $product->name = 'aku-kamu-' . mt_rand(1, 999);
        $product->code = 'P' . mt_rand(1, 9999999);
        $product->category_id = $category->id;
        $product->price = 100000;
        $product->link_locate_demo = 'aku-kamu-' . mt_rand(1, 999);
        $product->body = "<div>lorem ipsum</div>";

        $this->productRepository->create($product);
        $product->id = $this->productRepository->getIdByCode($product->code);
        $this->bodyProductRepository->create($product);

        // get by name
        $response = $this->productRepository->getByName($product->name);

        $this->assertIsObject($response);
        $this->assertEquals($response->name, $product->name);
        $this->assertEquals($response->code, $product->code);
        $this->assertEquals($response->category_id, $product->category_id);
        $this->assertEquals($response->category_name, $categoryName);
        $this->assertEquals($response->body, $product->body);
    }


    public function test_getAll()
    {
        // create category
        $categoryCode = 'C' . mt_rand(1, 9999999);
        $categoryName = 'category-' . mt_rand(1, 99999);

        $this->categoryRepository->create($categoryCode, $categoryName);

        $category = $this->categoryRepository->getByName($categoryName);

        $this->assertDatabaseHas('categories', [
            'code' => $categoryCode,
            'name' => $categoryName
        ]);

        // create product and body product
        $product = $this->productDomain;
        $product->name = 'aku-kamu-' . mt_rand(1, 999);
        $product->code = 'P' . mt_rand(1, 9999999);
        $product->category_id = $category->id;
        $product->price = 100000;
        $product->link_locate_demo = 'aku-kamu-' . mt_rand(1, 999);
        $product->body = "<div>lorem ipsum</div>";

        $this->productRepository->create($product);
        $product->id = $this->productRepository->getIdByCode($product->code);
        $this->bodyProductRepository->create($product);

        $product->name = 'aku-kamu-' . mt_rand(1, 999);
        $this->bodyProductRepository->create($product);

        // get by name
        $response = $this->productRepository->getAll();

        $this->assertIsObject($response);
    }



    public function test_update()
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

        $productNew = $this->productDomain;
        $productNew->name = 'kamu-dia-' . mt_rand(1, 99999);
        $productNew->code = $product->code;
        $productNew->price = 10000;
        $productNew->category_id = 2;

        $this->productRepository->update($productNew);

        $this->assertDatabaseHas('products', [
            'name' => $productNew->name,
            'code' => $productNew->code,
            'price' => $productNew->price,
            'category_id' => $productNew->category_id
        ]);
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
