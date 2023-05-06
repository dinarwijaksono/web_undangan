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
    }

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
}
