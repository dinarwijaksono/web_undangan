<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class Category_repository
{
    // create
    public function create(string $code, string $name): void
    {
        DB::table('categories')
            ->insert([
                'code' => $code,
                'name' => $name,
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);
    }


    // Read
    public function getByName(string $name): ?object
    {
        return DB::table('categories')
            ->select('id', 'code', 'name', 'created_at', 'updated_at')
            ->where('name', $name)
            ->first();
    }
}
