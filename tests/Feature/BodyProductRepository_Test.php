<?php

namespace Tests\Feature;

use App\Domain\Product_domain;
use App\Repository\BodyProduct_repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BodyProductRepository_Test extends TestCase
{
    public $productDomain;

    public $bodyProductRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->productDomain = $this->app->make(Product_domain::class);

        $this->bodyProductRepository = $this->app->make(BodyProduct_repository::class);

        config(['database.default' => 'mysql-test']);
    }

    // Create
    public function test_create()
    {
        $product = $this->productDomain;
        $product->id = 1;
        $product->body = "<div>aku kamu " . mt_rand(1, 9999) . " </div>";

        $this->bodyProductRepository->create($product);

        $this->assertDatabaseHas('body_products', [
            'product_id' => $product->id,
            'body' => $product->body
        ]);
    }


    // Update
    public function test_update()
    {
        $product = $this->productDomain;
        $product->id = 1;
        $product->body = "<div>aku kamu " . mt_rand(1, 9999) . " </div>";

        $this->bodyProductRepository->create($product);

        $this->assertDatabaseHas('body_products', [
            'product_id' => $product->id,
            'body' => $product->body
        ]);

        $product->body = "<section>lorem ipsum dolar is amet</section>";

        $this->bodyProductRepository->update($product);

        $this->assertDatabaseHas('body_products', [
            'product_id' => $product->id,
            'body' => $product->body
        ]);
    }


    // Delete
    public function test_delete()
    {
        $product = $this->productDomain;
        $product->id = 100;
        $product->body = "<div>aku kamu " . mt_rand(1, 9999) . " </div>";

        $this->bodyProductRepository->create($product);

        $this->assertDatabaseHas('body_products', [
            'product_id' => $product->id,
            'body' => $product->body
        ]);

        $this->bodyProductRepository->delete($product->id);
        $this->assertDatabaseMissing('body_products', [
            'product_id' => $product->id,
            'body' => $product->body
        ]);
    }
}
