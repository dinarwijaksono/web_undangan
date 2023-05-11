<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class Asset_repository
{
    // Create
    public function create(string $name, string $type): void
    {
        DB::table('assets')
            ->insert([
                'name' =>  $name,
                'type' => $type,
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);
    }


    // Read
    public function getAll(): ?object
    {
        return DB::table('assets')
            ->select('name', 'type', 'created_at', 'updated_at')
            ->orderBy('type')
            ->orderBy('name')
            ->get();
    }
}
