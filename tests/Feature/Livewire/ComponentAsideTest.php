<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ComponentAside;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ComponentAsideTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ComponentAside::class);

        $component->assertStatus(200);
    }
}
