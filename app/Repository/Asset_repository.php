<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class Asset_repository
{
    public function create(string $name, string $type): void
    {
        DB::table('assets')
            ->insert([
                'name' => $type . '/' . $name,
                'type' => $type,
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);
    }
}
