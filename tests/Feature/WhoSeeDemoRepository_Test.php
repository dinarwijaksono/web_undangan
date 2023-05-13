<?php

namespace Tests\Feature;

use App\Repository\WhoSeeDemo_repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WhoSeeDemoRepository_Test extends TestCase
{
    protected $whoSeeDemo_respository;

    public function setUp(): void
    {
        parent::setUp();

        $this->whoSeeDemo_respository = $this->app->make(WhoSeeDemo_repository::class);

        config(['database.default' => 'mysql-test']);
    }


    public function test_create()
    {
        $productId = mt_rand(1, 999);
        $userAgent = 'contoh-' . mt_rand(1, 999);

        $this->whoSeeDemo_respository->create($productId, $userAgent);

        $this->assertDatabaseHas('who_see_demos', ['product_id' => $productId, 'user_agent' => $userAgent]);
    }


    public function test_getAllByProductId()
    {
        $productId = mt_rand(1, 999);
        $userAgent = 'contoh-' . mt_rand(1, 999);

        $this->whoSeeDemo_respository->create($productId, $userAgent);

        $userAgent = 'contoh-' . mt_rand(1, 999);
        $this->whoSeeDemo_respository->create($productId, $userAgent);

        $userAgent = 'contoh-' . mt_rand(1, 999);
        $this->whoSeeDemo_respository->create($productId, $userAgent);

        $response = $this->whoSeeDemo_respository->getAllByProductId($productId);

        $this->assertIsObject($response);
        $this->assertTrue($response->count() >= 3);
    }


    public function test_getAll()
    {
        $productId = mt_rand(1, 999);
        $userAgent = 'contoh-' . mt_rand(1, 999);
        $this->whoSeeDemo_respository->create($productId, $userAgent);

        $productId = mt_rand(1, 999);
        $userAgent = 'contoh-' . mt_rand(1, 999);
        $this->whoSeeDemo_respository->create($productId, $userAgent);

        $productId = mt_rand(1, 999);
        $userAgent = 'contoh-' . mt_rand(1, 999);
        $this->whoSeeDemo_respository->create($productId, $userAgent);

        $response = $this->whoSeeDemo_respository->getAll();

        $this->assertIsObject($response);
        $this->assertTrue($response->count() >= 3);
    }
}
