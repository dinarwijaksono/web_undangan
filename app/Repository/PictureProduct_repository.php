<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class PictureProduct_repository
{
    public function create(int $productId, string $locateFile): void
    {
        DB::table('pictures_products')
            ->insert([
                'product_id' => $productId,
                'locate_file' => $locateFile,
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);
    }


    public function getAllByProductId($productId): object
    {
        return DB::table('pictures_products')
            ->select('id', 'product_id', 'locate_file', 'created_at', 'updated_at')
            ->where('product_id', $productId)
            ->get();
    }
}
