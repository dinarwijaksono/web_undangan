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
    public function getById(int $id): ?object
    {
        return DB::table('assets')
            ->select('id', 'name', 'type', 'created_at', 'updated_at')
            ->where('id', $id)
            ->first();
    }

    public function getByName(string $name): ?object
    {
        return DB::table('assets')
            ->select('id', 'name', 'type', 'created_at', 'updated_at')
            ->where('name', $name)
            ->first();
    }

    public function getAllByType(string $type): ?object
    {
        return DB::table('assets')
            ->select('id', 'name', 'type', 'created_at', 'updated_at')
            ->where('type', $type)
            ->get();
    }


    public function getAll(): ?object
    {
        return DB::table('assets')
            ->select('id', 'name', 'type', 'created_at', 'updated_at')
            ->orderBy('type')
            ->orderBy('name')
            ->get();
    }


    // Delete 
    public function deleteById(int $id): void
    {
        DB::table('assets')
            ->where('id', $id)
            ->delete();
    }
}
