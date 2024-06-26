<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ListSection;
use App\Models\User;
use Database\Seeders\User_seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ListSectionTest extends TestCase
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
        $component = Livewire::test(ListSection::class);

        $component->assertStatus(200);
    }
}
