<?php

namespace App\Repository;

use App\Domain\Product_domain;
use Illuminate\Support\Facades\DB;

class ProductAsset_repository
{

    // create
    public function create(Product_domain $product): void
    {
        if ($product->css_external != null) :
            for ($i = 0; $i < count($product->css_external); $i++) :
                DB::table('product_assets')
                    ->insert([
                        'product_id' => $product->id,
                        'asset_id' => $product->css_external[$i],
                        'created_at' => round(microtime(true) * 1000),
                        'updated_at' => round(microtime(true) * 1000),
                    ]);
            endfor;
        endif;

        if ($product->js_external != null) :
            for ($i = 0; $i < count($product->js_external); $i++) :
                DB::table('product_assets')
                    ->insert([
                        'product_id' => $product->id,
                        'asset_id' => $product->js_external[$i],
                        'created_at' => round(microtime(true) * 1000),
                        'updated_at' => round(microtime(true) * 1000),
                    ]);
            endfor;
        endif;
    }


    // Read
    public function getAllByProductId($product_id): ?object
    {
        return DB::table('product_assets')
            ->join('assets', 'assets.id', '=', 'product_assets.asset_id')
            ->select('product_assets.product_id', 'assets.name', 'assets.type', 'product_assets.asset_id', 'product_assets.created_at', 'product_assets.updated_at')
            ->where('product_assets.product_id', $product_id)
            ->get();
    }


    // update
    public function update(Product_domain $product): void
    {
        $this->deleteAllByProductId($product->id);

        $this->create($product);
    }


    public function deleteAllByProductId(int $productId): void
    {
        DB::table('product_assets')
            ->where('product_id',  $productId)
            ->delete();
    }
}
