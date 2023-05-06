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

    public function getByName(string $name): ?object
    {
        return DB::table('products')
            ->join('body_products', 'products.id', '=', 'body_products.product_id')
            ->select(
                'products.id',
                'products.category_id',
                'products.code',
                'products.name',
                'products.price',
                'products.link_locate_demo',
                'body_products.body',
                'products.created_at',
                'products.updated_at'
            )
            ->where('products.name', $name)
            ->first();
    }


    // Delete
    public function delete(string $code): void
    {
        DB::table('products')
            ->where('code', $code)
            ->delete();
    }
}
