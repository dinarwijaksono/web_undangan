<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class Product_service
{
    public function add($name, $price, $category_id): bool
    {
        $product = DB::table('products')
            ->select('name')
            ->where('name', $name)
            ->get();

        if ($product->isNotEmpty()) {
            return false;
        }


        DB::table('products')
            ->insert([
                'category_id' => $category_id,
                'code' => 'P' . mt_rand(1, 9999999),
                'name' => $name,
                'price' => $price,
                'link_locate_demo' => 'Link-' . mt_rand(1, 9999),
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);

        return true;
    }


    public function get($code)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.name as product_name', 'products.code', 'categories.id as category_id', 'products.price', 'categories.name as category_name')
            ->where('products.code', $code)
            ->get();

        return $product->first();
    }


    public function getByLink($link)
    {
        $product = DB::table('products')
            ->select('name', 'id', 'code')
            ->where('link_locate_demo', $link)
            ->get();

        return $product->first();
    }


    public function getAll()
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.name as product_name', 'products.price', 'categories.name as category_name', 'products.link_locate_demo', 'products.code', 'categories.id as category_id')
            ->get();

        return $product;
    }




    public function update($code, $name, $price, $category_id): bool
    {
        $product = $this->get($code);
        if ($name == $product->product_name && $price == $product->price && $category_id == $product->category_id) {
            return false;
        }

        $productByName = DB::table('products')->select('name')->where('name', $name)->get();
        if ($productByName->isNotEmpty()) {
            return false;
        }

        DB::table('products')
            ->where('code', $code)
            ->update([
                'name' => $name,
                'price' => $price,
                'category_id' => $category_id,
                'updated_at' => round(microtime(true) * 1000)
            ]);

        return true;
    }




    public function delete($code)
    {
        $product = DB::table('products')
            ->where('code', $code)
            ->select('code')
            ->get();

        if ($product->isEmpty()) {
            return false;
        }

        DB::table('products')
            ->where('code', $code)
            ->delete();

        return true;
    }
}
