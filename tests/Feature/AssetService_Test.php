<?php

namespace Tests\Feature;

use App\Services\Asset_service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AssetService_Test extends TestCase
{
    protected $assetService;

    public function setUp(): void
    {
        parent::setUp();

        $this->assetService = $this->app->make(Asset_service::class);

        config(['database.default' => 'mysql-test']);
    }

    public function test_create()
    {
        $name = 'bootstarp_3-' . mt_rand(1, 999) . '.css';
        $type = 'css';

        $this->assetService->create($name, $type);

        $this->assertDatabaseHas('assets', [
            'name' => $type . '/' . $name,
            'type' => $type,
        ]);
    }
}
