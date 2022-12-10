<?php

namespace Tests\Feature;

use App\Models\PicturesProduct;
use App\Models\Product;
use App\Services\PictureProduct_service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\VarDumper\Exception\ThrowingCasterException;
use Tests\TestCase;

class ProductPictureService_Test extends TestCase
{
    public $pictureProductService;

    public function setUp(): void
    {
        parent::setUp();

        $this->pictureProductService = $this->app->make(PictureProduct_service::class);
    }



    public function test_add_success()
    {
        $product_id = Product::get()->first();

        $name = 'F' . mt_rand(1, 9999999) . '.jpg';
        $this->pictureProductService->add($name, $product_id->id);

        $this->assertDatabaseHas('pictures_products', [
            'locate_file' => $name,
        ]);
    }




    public function test_isExist_success()
    {
        $product_id = Product::get()->first()->id;

        $response = $this->pictureProductService->isExist($product_id);

        $this->assertTrue($response);
    }
}
