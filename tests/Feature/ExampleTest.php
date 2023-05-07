<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        config(['database.default' => 'mysql-test']);
        Artisan::call('migrate:fresh --seed');

        $this->assertTrue(true);
    }
}
