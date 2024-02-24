<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\TableSectionCategory;
use App\Models\User;
use Database\Seeders\User_seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TableSectionCategoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(User_seeder::class);
        $user = User::select('*')->first();
        $this->actingAs($user);
    }

    public function test_the_component_can_render()
    {
        $component = Livewire::test(TableSectionCategory::class);

        $component->assertStatus(200);

        Livewire::test(TableSectionCategory::class)
            ->assertSee('Daftar kategori section')
            ->assertSee('Nama');
    }


    public function test_doCreateCategorySection_success()
    {
        $name = 'contoh-' . mt_rand(1, 999);

        $component = Livewire::test(TableSectionCategory::class)
            ->set('category_name', $name)
            ->call('doCreateCategorySection')
            ->assertHasNoErrors('category_name');

        $this->assertDatabaseHas('section_categories', [
            'name' => $name
        ]);
    }


    public function test_doCreateCategorySection_success_validation()
    {
        $name = '';

        $component = Livewire::test(TableSectionCategory::class)
            ->set('category_name', $name)
            ->call('doCreateCategorySection')
            ->assertHasErrors('category_name');

        $this->assertDatabaseMissing('section_categories', [
            'name' => $name
        ]);
    }
}
