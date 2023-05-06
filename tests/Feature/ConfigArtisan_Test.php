<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ConfigArtisan_Test extends TestCase
{
    public function test_migration()
    {
        config(['database.default' => 'mysql-test']);
        Artisan::call('migrate:fresh --seed');

        $this->assertTrue(true);
    }
}
