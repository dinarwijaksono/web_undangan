<?php

namespace Tests\Feature\Services;

use App\Models\User;
use App\Services\Auth_service;
use Database\Seeders\User_seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthService_Test extends TestCase
{
    public $authService;

    public function setUp(): void
    {
        parent::setUp();

        $this->authService = $this->app->make(Auth_service::class);
    }

    public function test_login_success()
    {
        $this->seed(User_seeder::class);

        $user = User::select('*')->where('email', 'test@gmail.com')->first();

        $response = $this->authService->login($user->email, 'test');

        $this->assertIsBool($response);
        $this->assertTrue($response);
    }


    public function test_login_emailIsWrong_failed()
    {
        $this->seed(User_seeder::class);

        $user = User::select('*')->where('email', 'test@gmail.com')->first();

        $response = $this->authService->login('empty', 'test');

        $this->assertIsBool($response);
        $this->assertFalse($response);
    }
}
