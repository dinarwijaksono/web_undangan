<?php

namespace Tests\Feature;

use App\Domain\Product_domain;

use App\Repository\ProductAsset_repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductAssetRepository_Test extends TestCase
{
    public $productAsset_repository;

    function setUp(): void
    {
        parent::setUp();

        $this->productAsset_repository = $this->app->make(ProductAsset_repository::class);

        config(['database.default' => 'mysql-test']);
    }


    public function test_addNotEmpty()
    {
        $product = new Product_domain();
        $product->id = mt_rand(1, 99);
        $product->css_external = [1, 2, 3];
        $product->js_external = [4, 5, 6];

        $this->productAsset_repository->create($product);

        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 1]);
        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 3]);
        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 5]);
        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 6]);
    }


    public function test_addEmpty()
    {
        $product = new Product_domain();
        $product->id = mt_rand(1, 99);
        $product->css_external = [];
        $product->js_external = NULL;

        $this->productAsset_repository->create($product);

        $this->assertTrue(true);
    }



    public function test_getAllByProductId()
    {
        $product = new Product_domain();
        $product->id = mt_rand(1, 99);
        $product->css_external = [1, 2];
        $product->js_external = [4, 5];

        $this->productAsset_repository->create($product);

        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 1]);
        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 5]);

        $response = $this->productAsset_repository->getAllByProductId($product->id);

        $this->assertIsObject($response);
    }


    public function test_updateSuccess()
    {
        $product = new Product_domain();
        $product->id = mt_rand(1, 99);
        $product->css_external = [1, 2, 3];
        $product->js_external = [4, 5, 6];

        $this->productAsset_repository->create($product);

        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 1]);
        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 3]);
        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 5]);
        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 6]);

        $product->css_external = [7, 8];
        $product->js_external = [9, 10];

        $this->assertDatabaseMissing('product_assets', ['product_id' => $product->id, 'asset_id' => 7]);
        $this->assertDatabaseMissing('product_assets', ['product_id' => $product->id, 'asset_id' => 8]);
        $this->assertDatabaseMissing('product_assets', ['product_id' => $product->id, 'asset_id' => 9]);
        $this->assertDatabaseMissing('product_assets', ['product_id' => $product->id, 'asset_id' => 10]);
    }



    public function test_deleteAllByproductId()
    {
        $product = new Product_domain();
        $product->id = mt_rand(1, 99);
        $product->css_external = [1, 2];
        $product->js_external = [4, 5];

        $this->productAsset_repository->create($product);

        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 1]);
        $this->assertDatabaseHas('product_assets', ['product_id' => $product->id, 'asset_id' => 5]);

        $this->productAsset_repository->deleteAllByProductId($product->id);

        $this->assertDatabaseMissing('product_assets', ['product_id' => $product->id, 'asset_id' => 1]);
        $this->assertDatabaseMissing('product_assets', ['product_id' => $product->id, 'asset_id' => 5]);
    }
}
