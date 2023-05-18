<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class WhoSeeDemo_repository
{
    // create
    public function create($productId, $userAgent): void
    {
        DB::table('who_see')
            ->insert([
                'product_id' => $productId,
                'user_agent' => $userAgent,
                'created_at' => round(microtime(true) * 1000)
            ]);
    }


    // read
    public function getAllByProductId(int $productId): object
    {
        return DB::table('who_see')
            ->select('product_id', 'user_agent', 'created_at')
            ->where('product_id', $productId)
            ->orderBy('created_at', 'desc')
            ->get();
    }


    public function getAll(): object
    {
        return DB::table('who_see')
            ->select('product_id', 'user_agent', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }


    // Delete
    public function deleteByProductId(int $productId): void
    {
        DB::table('who_see')
            ->where('product_id', $productId)
            ->delete();
    }
}
