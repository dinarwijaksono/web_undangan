<?php

namespace Tests\Feature;

use App\Services\User_service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserService_Test extends TestCase
{
    private $user_service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user_service = $this->app->make(User_service::class);
    }



    public function test_getCode()
    {
        $response = $this->user_service->getRegisterCode();

        $this->assertEquals($response, 'dinar wijaksono');
    }



    public function test_registerFailed()
    {
        $response = $this->user_service->register('dinarwijaksono11@gmail.com', 'damayanti');

        $this->assertIsBool($response);
        $this->assertFalse($response);
    }


    public function test_registerSuccess()
    {
        $response = $this->user_service->register('damayanti@gmail.com', 'damayanti');

        $this->assertIsBool($response);
        $this->assertTrue($response);
        $this->assertDatabaseHas('users', ['email' => 'damayanti@gmail.com']);
    }
}
