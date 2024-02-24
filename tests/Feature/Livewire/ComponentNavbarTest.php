<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ComponentNavbar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ComponentNavbarTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ComponentNavbar::class);

        $component->assertStatus(200);
    }
}
