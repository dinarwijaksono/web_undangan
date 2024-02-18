<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\FormCreateSectionCategory;
use App\Models\User;
use Database\Seeders\User_seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FormCreateSectionCategoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(User_seeder::class);
        $user = User::select('*')->where('username', 'test')->first();
        $this->actingAs($user);
    }

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(FormCreateSectionCategory::class);

        $component->assertStatus(200);
    }

    public function test_doCreateSectionCategory_success()
    {
        Livewire::test(FormCreateSectionCategory::class)
            ->set('name', 'contoh nama')
            ->call('doCreateSectionCategory');

        $this->assertDatabaseHas('section_categories', [
            'name' => 'contoh nama'
        ]);
    }

    public function test_doCreateSectionCategory_failed_validation()
    {
        Livewire::test(FormCreateSectionCategory::class)
            ->set('name', '')
            ->call('doCreateSectionCategory')
            ->assertHasErrors('name');
    }
}
