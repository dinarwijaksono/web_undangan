<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;
use PhpParser\ErrorHandler\Collecting;

use function PHPUnit\Framework\assertTrue;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_success()
    {
        $faker = Faker::create('id_iD');

        $email = $faker->email;

        $data = [
            'email' => $email,
            'password' => 'damayanti',
            'password_confirmation' => 'damayanti'
        ];

        $user = collect(User::all())->first();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/Config/addUser', $data);

        $response->assertStatus(200);
        $this->assertTrue(collect(User::where('email', $email)->get())->isNotEmpty());
        $response->assertSessionHasNoErrors(['email']);
        $response->assertSessionHasNoErrors(['password']);
        $response->assertSessionHasNoErrors(['password_confirmation']);
    }



    public function test_create_failed()
    {
        $data = [
            'email' => NULL,
            'password' => 'inipassword',
            'password_confirmation' => 'passwordsalah'
        ];

        $user = collect(User::all())->first();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/Config/addUser', $data);
        $response->assertSessionHasErrors(['email', 'password_confirmation']);
    }






    public function test_delete_success()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $userToDelete = collect(User::all())->pop();
        $id = $userToDelete->id;

        $response = $this->actingAs($user)
            ->withSession(['bannde' => false])
            ->delete("/Config/deleteUser/$id");

        $this->assertTrue(collect(User::where('id', $id)->get())->isEmpty());
    }
}
