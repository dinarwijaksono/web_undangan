<?php

namespace Tests\Feature;

use App\Repository\Asset_repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AssetRepository_Test extends TestCase
{
    protected $assetRepository;

    public function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'mysql-test']);

        $this->assetRepository = $this->app->make(Asset_repository::class);
    }

    public function test_create()
    {
        $name = 'bootstarp_3-' . mt_rand(1, 999);
        $type = 'css';

        $this->assetRepository->create($type . '/' . $name . '.css', $type);

        $nameFile = $type . "/" . $name . '.css';

        $this->assertDatabaseHas('assets', [
            'name' => $nameFile,
            'type' => $type,
        ]);
    }

    public function test_getAllByType()
    {
        $name = 'bootstarp_3-' . mt_rand(1, 999) . '.css';
        $type = 'css';

        $this->assetRepository->create($type . '/' . $name, $type);

        $response = $this->assetRepository->getAllByType($type);

        $this->assertIsObject($response);
        $this->assertDatabaseHas('assets', ['name' => $type . '/' . $name]);
    }


    public function test_getAll()
    {
        $name = 'bootstarp_3-' . mt_rand(1, 999) . '.css';
        $type = 'css';

        $this->assetRepository->create($type . '/' . $name, $type);

        $response = $this->assetRepository->getAll();

        $this->assertIsObject($response);
        $this->assertDatabaseHas('assets', ['name' => $type . '/' . $name]);
    }


    public function test_delete()
    {
        $name = 'bootstarp_3-' . mt_rand(1, 999) . 'css';
        $type = 'css';

        $this->assetRepository->create($type . '/' . $name, $type);

        $nameFile = $type . "/" . $name;

        $this->assertDatabaseHas('assets', [
            'name' => $nameFile
        ]);

        $asset = $this->assetRepository->getByName($nameFile);

        $this->assetRepository->deleteById($asset->id);

        $this->assertDatabaseMissing('assets', [
            'name' => $nameFile
        ]);
    }
}
