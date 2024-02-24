<?php

namespace Database\Seeders;

use App\Models\Section_category;
use Illuminate\Database\Seeder;

class SectionCategory_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section_category::insert([
            'name' => 'example - ' . mt_rand(1, 999),
            'created_at' => round(microtime(true) * 1000),
            'updated_at' => round(microtime(true) * 1000),
        ]);
    }
}
