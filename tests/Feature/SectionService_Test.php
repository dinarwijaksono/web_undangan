<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\Section_service;
use Database\Seeders\SectionCategory_seeder;
use Database\Seeders\User_seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SectionService_Test extends TestCase
{
    public $sectionService;

    public function setUp(): void
    {
        parent::setUp();

        $this->sectionService = $this->app->make(Section_service::class);

        $this->seed(User_seeder::class);

        $user = User::select('*')->where('username', 'test')->first();

        $this->actingAs($user);
    }

    public function test_createCategory_success()
    {
        $name = "Contoh nama section_category";

        $this->sectionService->createCategory($name);

        $this->assertDatabaseHas('section_categories', [
            'name' => $name,
        ]);
    }


    public function test_getTheListCategory_success()
    {
        $this->seed(SectionCategory_seeder::class);
        $this->seed(SectionCategory_seeder::class);
        $this->seed(SectionCategory_seeder::class);

        $response = $this->sectionService->getTheListCategory();

        $this->assertIsObject($response);
        $this->assertEquals($response->count(), 3);
        $this->assertArrayHasKey('name', $response->first()->toArray());
        $this->assertArrayHasKey('created_at', $response->first()->toArray());
        $this->assertArrayHasKey('updated_at', $response->first()->toArray());
    }
}
