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
        $product->css_internal = "body { border: 1px solid red; }";
        $product->body = "<div>aku kamu " . mt_rand(1, 9999) . " </div>";
        $product->js_internal = "let name = documents.getElementByName('input')";

        $this->bodyProductRepository->create($product);

        $this->assertDatabaseHas('body_products', [
            'product_id' => $product->id,
            'css_internal' => $product->css_internal,
            'body' => $product->body,
            'js_internal' => $product->js_internal,
        ]);
    }


    // Update
    public function test_update()
    {
        $product = $this->productDomain;
        $product->id = 1;
        $product->css_internal = "body { border: 1px solid red; }";
        $product->body = "<div>aku kamu " . mt_rand(1, 9999) . " </div>";
        $product->js_internal = "let name = documents.getElementByName('input')";

        $this->bodyProductRepository->create($product);

        $this->assertDatabaseHas('body_products', [
            'product_id' => $product->id,
            'css_internal' => $product->css_internal,
            'body' => $product->body,
            'js_internal' => $product->js_internal,
        ]);

        $product->css_internal = "body { border: 10px solid black; }";
        $product->body = "<section>lorem ipsum dolar is amet</section>";
        $product->js_internal = "let name = documents.getElementByName('input')";

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
        $product->internal_css = NULL;
        $product->body = "<div>aku kamu " . mt_rand(1, 9999) . " </div>";
        $product->internal_js = NULL;

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
