<?php

namespace App\Repository;

use App\Domain\Product_domain;
use Illuminate\Support\Facades\DB;

class BodyProduct_repository
{
    public function create(Product_domain $product): void
    {
        DB::table('body_products')
            ->insert([
                'product_id' => $product->id,
                'body' => $product->body,
            ]);
    }


    public function delete(int $product_id): void
    {
        DB::table('body_products')
            ->where('product_id', $product_id)
            ->delete();
    }
}
