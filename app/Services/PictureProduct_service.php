<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PictureProduct_service
{

    public function add(string $name, $product_id)
    {
        DB::table('pictures_products')
            ->insert([
                'product_id' => $product_id,
                'locate_file' => $name,
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);
    }


    public function getByProductId(string $product_id)
    {
        $item = DB::table('pictures_products')
            ->where('product_id', $product_id)
            ->select('product_id', 'locate_file', 'created_at', 'updated_at')
            ->get();

        if ($item->isEmpty()) {
            return [
                'isEmpty' => true,
            ];
        } else {
            return [
                'isEmpty' => false,
                'data' => $item->first()
            ];
        }
    }


    public function isExist(int $product_id): bool
    {
        $item = DB::table('pictures_products')
            ->where('product_id', $product_id)
            ->select('product_id')
            ->get();

        if ($item->isEmpty()) {
            return false;
        } else {
            return true;
        }
    }



    public function update(string $name, int $product_id)
    {
        DB::table('pictures_products')
            ->where('product_id', $product_id)
            ->update([
                'locate_file' => $name,
                'updated_at' => round(microtime(true) * 1000)
            ]);
    }
}
