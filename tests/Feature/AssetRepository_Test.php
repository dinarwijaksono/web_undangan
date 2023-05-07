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

        $this->assetRepository = $this->app->make(Asset_repository::class);

        config(['database.default' => 'mysql-test']);
    }

    public function test_create()
    {
        $name = 'bootstarp_3-' . mt_rand(1, 999) . '.css';
        $type = 'css';

        $this->assetRepository->create($name, $type);

        $this->assertDatabaseHas('assets', [
            'name' => $type . '/' . $name,
            'type' => $type,
        ]);
    }
}
