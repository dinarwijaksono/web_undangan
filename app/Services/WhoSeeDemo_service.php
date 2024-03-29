<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class WhoSeeDemo_service
{
    public function add(int $productId, string $user_agent): void
    {
        DB::table('who_see_demos')
            ->insert([
                'product_id' => $productId,
                'user_agent' => $user_agent,
                'created_at' => round(microtime(true) * 1000),
            ]);
    }


    public function getViews(int $product_id): ?object
    {
        $who_see = DB::table('who_see_demos')
            ->select('product_id', 'user_agent', 'created_at')
            ->where('product_id', $product_id)
            ->get();

        return $who_see;
    }
}
