<?php

namespace Tests\Feature\Services;

use App\Domain\User_domain;
use App\Services\User_service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertIsNotBool;

class UserService_Test extends TestCase
{
    protected $userService;

    public function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(User_service::class);
    }


    public function test_create_success()
    {
        $userDomain = new User_domain();
        $userDomain->role = 1;
        $userDomain->username = 'test';
        $userDomain->email = 'test@gmail.com';
        $userDomain->password = 'test';

        $response = $this->userService->create($userDomain);

        $this->assertIsBool($response);
        $this->assertTrue($response);

        $this->assertDatabaseHas('users', [
            'role' => $userDomain->role,
            'username' => $userDomain->username,
            'email' => $userDomain->email,
        ]);
    }
}
