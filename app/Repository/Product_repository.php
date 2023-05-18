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
                'type' => $product->type,
                'price' => $product->price,
                'link_locate' => $product->link_locate,
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
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('body_products', 'products.id', '=', 'body_products.product_id')
            ->select(
                'products.name',
                'products.code',
                'products.price',
                'products.type',
                'categories.name as category_name',
                'products.category_id',
                'products.link_locate',
                'body_products.css_internal',
                'body_products.body',
                'body_products.js_internal',
                'products.created_at',
                'products.updated_at',
            )
            ->where('products.name', $name)
            ->first();
    }


    public function getByCode(string $code): ?object
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('body_products', 'products.id', '=', 'body_products.product_id')
            ->select(
                'products.id',
                'products.name',
                'products.code',
                'products.price',
                'products.type',
                'categories.name as category_name',
                'products.category_id',
                'products.link_locate',
                'body_products.css_internal',
                'body_products.body',
                'body_products.js_internal',
                'products.created_at',
                'products.updated_at',
            )
            ->where('products.code', $code)
            ->first();
    }

    public function getByLinkLocate(string $linkLocate): object
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('body_products', 'products.id', '=', 'body_products.product_id')
            ->select(
                'products.id',
                'products.name',
                'products.code',
                'products.price',
                'products.type',
                'categories.name as category_name',
                'products.category_id',
                'products.link_locate',
                'body_products.css_internal',
                'body_products.body',
                'body_products.js_internal',
                'products.created_at',
                'products.updated_at',
            )
            ->where('products.link_locate', $linkLocate)
            ->first();
    }




    public function getAll(): object
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('body_products', 'products.id', '=', 'body_products.product_id')
            ->select(
                'products.id',
                'products.name',
                'products.code',
                'products.price',
                'products.type',
                'categories.name as category_name',
                'products.category_id',
                'products.link_locate',
                'body_products.css_internal',
                'body_products.body',
                'body_products.js_internal',
                'products.created_at',
                'products.updated_at',
            )
            ->orderBy('products.created_at', 'desc')
            ->get();
    }


    // update
    public function update(Product_domain $product): void
    {
        DB::table('products')
            ->where('code', $product->code)
            ->update([
                'category_id' => $product->category_id,
                'name' => $product->name,
                'price' => $product->price,
                'updated_at' => round(microtime(true) * 1000)
            ]);
    }

    // Delete
    public function delete(string $code): void
    {
        DB::table('products')
            ->where('code', $code)
            ->delete();
    }
}
