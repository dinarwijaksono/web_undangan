<?php

namespace Tests\Feature;

use App\Repository\PictureProduct_repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PictureProductRepository_Test extends TestCase
{
    public $pictureRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->pictureRepository = $this->app->make(PictureProduct_repository::class);

        config(['database.default' => 'mysql-test']);
    }


    public function test_create()
    {
        $productId = mt_rand(1, 999);
        $locateFile = '/Storage/thum/contoh-' . mt_rand(1, 9999);

        $this->pictureRepository->create($productId, $locateFile);

        $this->assertDatabaseHas('pictures_products', [
            'product_id' => $productId,
            'locate_file' => $locateFile
        ]);
    }


    public function test_getAllByProductId()
    {
        $productId = mt_rand(1, 999);
        $locateFile = '/Storage/thum/contoh-' . mt_rand(1, 9999);

        $this->pictureRepository->create($productId, $locateFile);

        $locateFile = '/Storage/thum/contoh-' . mt_rand(1, 9999);
        $this->pictureRepository->create($productId, $locateFile);

        $response = $this->pictureRepository->getAllByProductId($productId);

        $this->assertIsObject($response);
        $this->assertTrue($response->count() >= 2);
    }


    public function test_deleteByLocate()
    {
        $productId = mt_rand(1, 999);
        $locateFile = 'thum/contoh-' . mt_rand(1, 9999) . '.jpg';

        $this->pictureRepository->create($productId, $locateFile);

        $picture = $this->pictureRepository->getByLocateFile($locateFile);

        $this->assertDatabaseHas('pictures_products', ['locate_file' => $locateFile, 'product_id' => $productId]);

        $this->pictureRepository->deleteByLocateFile($picture->locate_file);

        $this->assertDatabaseMissing('pictures_products', ['locate_file' => $locateFile]);
    }
}
