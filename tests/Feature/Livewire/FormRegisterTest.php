<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\FormRegister;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FormRegisterTest extends TestCase
{
    public function test_the_component_can_render()
    {
        $component = Livewire::test(FormRegister::class);

        $component->assertStatus(200);
    }

    public function test_doRegister_failed_validation()
    {
        Livewire::test(FormRegister::class)
            ->set('username', '')
            ->set('email', '')
            ->set('password', '')
            ->set('password_confirmation', '')
            ->call('doRegister')
            ->assertHasErrors(['username', 'email', 'password', 'password_confirmation']);
    }


    public function test_doRegister_success()
    {
        Livewire::test(FormRegister::class)
            ->set('username', 'test')
            ->set('email', 'test@gmail.com')
            ->set('password', 'test')
            ->set('password_confirmation', 'test')
            ->call('doRegister')
            ->assertHasNoErrors(['username', 'email', 'password', 'password_confirmation'])
            ->assertRedirect('/Login');

        $this->assertDatabaseHas('users', [
            'username' => 'test',
            'email' => 'test@gmail.com'
        ]);
    }
}
