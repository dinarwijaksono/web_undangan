<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class OrderTest extends TestCase
{
    use WithFaker;

    public function test_create_success()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $faker = $this->faker('id_ID');
        $male = $faker->firstName('male');
        $female = $faker->firstName('female');

        $name = $male . ' & ' . $female;
        $link_name = $male . '_' . $female;
        $expired = "10/2/2022";

        $data = [
            'name' => $name,
            'link_name' => $link_name,
            'expired' => $expired
        ];

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post("/Order/create", $data);

        $expired2 = strtotime($expired) * 1000;

        $response->assertStatus(200);
        $response->assertValid(['name', 'link_name', 'expired']);
        $this->assertDatabaseHas('orders', ['order_from' => $name, 'link_locate' => $link_name, 'expired' => $expired2]);
    }





    public function test_update_success()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();

        $faker = $this->faker('id_ID');
        $male = $faker->firstName('male');
        $female = $faker->firstName('female');

        $name = $male . ' & ' . $female;
        $link_name = $male . '_' . $female;
        $expired = "10/2/2022";

        $code = collect(Order::all())->pop()->code;

        $data = [
            'name' => $name,
            'link_name' => $link_name,
            'expired' => $expired
        ];

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post("/Order/edit/$code", $data);

        $expired2 = strtotime($expired) * 1000;

        $response->assertStatus(200);
        $response->assertValid('name', 'link_name', 'expired');
        $this->assertDatabaseHas('orders', ['order_from' => $name, 'link_locate' => $link_name, 'expired' => $expired2]);
    }




    public function test_delete()
    {
        $user = collect(User::where('email', 'admin@gmail.com')->get())->first();
        $code = collect(Order::all())->pop()->code;

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->delete("/Order/delete/$code");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('orders', ['code' => $code]);
    }
}
