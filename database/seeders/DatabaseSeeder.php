<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $data = [
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234'),
            'created_at' => floor(microtime(true) * 1000),
            'updated_at' => floor(microtime(true) * 1000),
        ];

        DB::table('users')->insert($data);
    }
}
