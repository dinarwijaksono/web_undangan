<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class Order_service
{
    public function add($order_from, $link_locate, $expired)
    {
        $link = trim($link_locate);
        $link = explode(' ', $link);
        $count = count($link);

        if ($count > 1) {
            return [
                'isSuccess' => false,
                'message' => "Link tidak boleh mengunakan spasi."
            ];
        }

        $getByLink = $this->getByLink($link_locate);
        if ($getByLink->isNotEmpty()) {
            return [
                'isSuccess' => false,
                'message' => "Link sudah di gunakan."
            ];
        }


        DB::table('orders')
            ->insert([
                'code' => 'O' . mt_rand(1, 9999999),
                'order_from' => $order_from,
                'link_locate' => $link_locate,
                'expired' => $expired,
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);

        return [
            'isSuccess' => true
        ];
    }

    public function getIdByCode($code)
    {
        $order = DB::table('orders')
            ->select('id')
            ->where('code', $code)
            ->first();

        return $order->id;
    }

    public function getByLink($link)
    {
        $order = DB::table('orders')
            ->select('link_locate', 'order_from', 'expired', 'code')
            ->where('link_locate', $link)
            ->first();

        return $order;
    }

    public function getByCode($code)
    {
        $order = DB::table('orders')
            ->select('link_locate', 'order_from', 'expired', 'code')
            ->where('code', $code)
            ->first();

        return $order;
    }

    public function getAll()
    {
        $order = DB::table('orders')
            ->select('link_locate', 'order_from', 'code', 'expired')
            ->orderBy('expired', 'desc')
            ->get();

        return $order;
    }



    public function update($code, $order_from, $link_locate, $expired)
    {
        $link = trim($link_locate);
        $link = explode(' ', $link);
        $count = count($link);

        // validasi apakah link terdapat spasi
        if ($count > 1) {
            return [
                'isSuccess' => false,
                'message' => "Link tidak boleh mengunakan spasi."
            ];
        }

        // link apakah link sudah digunakan
        $getByLink = DB::table('orders')
            ->where('code', '!=', $code)
            ->where('link_locate', $link_locate)
            ->get();
        if ($getByLink->isNotEmpty()) {
            return [
                'isSuccess' => false,
                'message' => "Link sudah di gunakan."
            ];
        }


        // validasi apakah terdapat perubahan
        $order = $this->getByCode($code);
        if ($order->link_locate == $link_locate && $order->order_from == $order_from && $order->expired == $expired) {
            return [
                'isSuccess' => false,
                'message' => "Anda tidak melakukan perubahan apapun."
            ];
        }


        // update 
        DB::table('orders')
            ->where('code', $code)
            ->update([
                'order_from' => $order_from,
                'link_locate' => $link_locate,
                'expired' => $expired,
                'updated_at' => round(microtime(true) * 1000),
            ]);

        return [
            'isSuccess' => true,
        ];
    }



    public function delete($code)
    {
        DB::table('orders')
            ->where('code', $code)
            ->delete();
    }
}
