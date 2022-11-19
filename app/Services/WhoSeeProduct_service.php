<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class WhoSeeProduct_service
{
    public function add($orderId, $user_agent)
    {
        DB::table('who_see_orders')
            ->insert([
                'order_id' =>  $orderId,
                'user_agent' => $user_agent,
                'created_at' => round(microtime(true) * 1000)
            ]);
    }

    public function getCountView($orderId)
    {
        $whoSee = DB::table('who_see_orders')
            ->select('id')
            ->where('order_id', $orderId)
            ->get();

        return $whoSee->count();
    }
}
