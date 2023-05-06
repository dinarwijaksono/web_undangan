<?php

namespace App\Services;

use App\Domain\Product_domain;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use App\Repository\BodyProduct_repository;
use App\Repository\Product_repository;
use Illuminate\Http\Request;

class Product_service
{
    private $productDomain;
    private $productRepository;
    private $bodyProductRepository;

    public function __construct(Product_domain $product_domain, Product_repository $product_repository, BodyProduct_repository $bodyProduct_repository)
    {
        $this->productDomain = $product_domain;

        $this->productRepository = $product_repository;
        $this->bodyProductRepository = $bodyProduct_repository;
    }


    public function add(Request $request)
    {
        try {

            DB::beginTransaction();

            $product = $this->productDomain;
            $product->name = $request->name;
            $product->code = 'P' . mt_rand(1, 9999999);
            $product->price = $request->price;
            $product->link_locate_demo = 'Link-' . mt_rand(1, 9999);
            $product->category_id = $request->category_id;
            $product->body = $request->body;

            $this->productRepository->create($product);

            // get id by code
            $product->id = $this->productRepository->getIdByCode($product->code);
            $this->bodyProductRepository->create($product);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            throw $th;
        }
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

    public function getIdByCode(string $code)
    {
        $product = DB::table('products')
            ->select('id')
            ->where('code', $code)
            ->get();

        return $product->first()->id;
    }

    public function getByCode(string $code)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.name', 'products.price', 'products.link_locate_demo', 'products.created_at', 'categories.name as category_name')
            ->where('products.code', $code)
            ->get();

        return $product->first();
    }


    public function getByName(string $name): ?object
    {
        return $this->productRepository->getByName($name);
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
            ->select('products.name as product_name', 'products.price', 'categories.name as category_name', 'products.link_locate_demo', 'products.code', 'categories.id as category_id', 'products.id as product_id')
            ->get();

        return $product;
    }




    public function update($code, $name, $price, $category_id): array
    {
        $product = $this->get($code);
        if ($name == $product->product_name && $price == $product->price && $category_id == $product->category_id) {
            return [
                'isSuccess' => false,
                'message' => "Tidak ada perubahan."
            ];
        }

        $productByName = DB::table('products')
            ->select('name')
            ->where('name', $name)
            ->where('code', '!=', $code)
            ->get();
        if ($productByName->isNotEmpty()) {
            return [
                'isSuccess' => false,
                'message' => "Terdapat nama product yang sama."
            ];
        }

        DB::table('products')
            ->where('code', $code)
            ->update([
                'name' => $name,
                'price' => $price,
                'category_id' => $category_id,
                'updated_at' => round(microtime(true) * 1000)
            ]);

        return [
            'isSuccess' => true
        ];
    }




    public function delete(string $code): void
    {
        try {
            DB::beginTransaction();

            $product_id = $this->productRepository->getIdByCode($code);

            $this->bodyProductRepository->delete($product_id);
            $this->productRepository->delete($code);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
    }
}
