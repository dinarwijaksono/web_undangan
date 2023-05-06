<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

use App\Domain\Product_domain;

class Product_repository
{
    // create
    public function create(Product_domain $product): void
    {
        DB::table('products')
            ->insert([
                'category_id' => $product->category_id,
                'code' => $product->code,
                'name' => $product->name,
                'price' => $product->price,
                'link_locate_demo' => $product->link_locate_demo,
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);
    }

    // read
    public function getIdByCode(string $code): int
    {
        $product = DB::table('products')
            ->select('id')
            ->where('code', $code)
            ->first();

        return $product->id;
    }


    // Delete
    public function delete(string $code): void
    {
        DB::table('product')
            ->where('code', $code)
            ->delete();
    }
}
