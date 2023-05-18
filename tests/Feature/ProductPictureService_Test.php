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
        config(['database.default' => 'mysql-test']);


        $this->pictureProductService = $this->app->make(PictureProduct_service::class);
    }



    public function test_addSuccess()
    {
        $name = 'F' . mt_rand(1, 9999999) . '.jpg';
        $this->pictureProductService->create(mt_rand(1, 999), $name);

        $this->assertDatabaseHas('pictures_products', [
            'locate_file' => $name,
        ]);
    }




    // public function test_isExist_success()
    // {
    //     $response = $this->pictureProductService->isExist(mt_rand(1,));

    //     $this->assertTrue($response);
    // }
}
