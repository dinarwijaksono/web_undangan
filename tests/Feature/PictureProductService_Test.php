<?php

namespace Tests\Feature;

use App\Services\PictureProduct_service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PictureProductService_Test extends TestCase
{
    private $pictureProductService;

    public function setUp(): void
    {
        parent::setUp();

        $this->pictureProductService = $this->app->make(PictureProduct_service::class);

        config(['database.default' => 'mysql-test']);
    }


    public function test_create()
    {
        $productId = mt_rand(1, 9999);
        $locateFile = 'thum/contoh-' . mt_rand(1, 9999);

        $this->pictureProductService->create($productId, $locateFile);

        $this->assertDatabaseHas('pictures_products', ['product_id' => $productId, 'locate_file' => $locateFile]);
    }
}
