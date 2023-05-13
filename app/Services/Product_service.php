<?php

namespace App\Services;

use App\Domain\Product_domain;
use App\Models\product_asset;
use Illuminate\Support\Facades\DB;

use App\Repository\BodyProduct_repository;
use App\Repository\Category_repository;
use App\Repository\Product_repository;
use App\Repository\ProductAsset_repository;
use App\Repository\WhoSeeDemo_repository;
use Illuminate\Http\Request;

class Product_service
{
    private $productDomain;
    private $productRepository;
    private $bodyProductRepository;
    private $productAssetRepository;
    private $categoryRepository;
    private $whoSeeDemoRepository;

    public function __construct(
        Product_domain $product_domain,
        Product_repository $product_repository,
        BodyProduct_repository $bodyProduct_repository,
        ProductAsset_repository $productAsset_repository,
        WhoSeeDemo_repository $whoSeeDemo_repository
    ) {
        $this->productDomain = $product_domain;

        $this->productRepository = $product_repository;
        $this->bodyProductRepository = $bodyProduct_repository;
        $this->productAssetRepository = $productAsset_repository;
        $this->whoSeeDemoRepository = $whoSeeDemo_repository;
    }


    // create
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
            $product->css_external = $request->css_external;
            $product->js_external = $request->js_external;
            $product->css_internal = $request->css_internal;
            $product->body = $request->body;
            $product->js_internal = $request->js_internal;

            $this->productRepository->create($product);

            // get id by code
            $product->id = $this->productRepository->getIdByCode($product->code);
            $this->bodyProductRepository->create($product);

            $this->productAssetRepository->create($product);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            throw $th;
        }
    }


    // Read
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
        $product = $this->productRepository->getByCode($code);

        $productId = $this->productRepository->getIdByCode($code);

        $product->product_asset = collect($this->productAssetRepository->getAllByProductId($productId));

        $product = collect($product);

        return $product;
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
        $product = collect($this->productRepository->getAll());

        $product = $product->map(function ($item) {
            $whoSee = $this->whoSeeDemoRepository->getAll();

            $item->total_views = $whoSee->where('product_id', $item->id)->count();
            return $item;
        });

        return $product;
    }




    // update
    public function update(Request $request, string $code): void
    {
        try {
            DB::beginTransaction();

            $product = $this->productDomain;
            $product->code = $code;
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->css_external = $request->css_external;
            $product->js_external = $request->js_external;
            $product->css_internal = $request->css_internal;
            $product->body = $request->body;
            $product->js_internal = $request->js_internal;
            $product->id = $this->productRepository->getIdByCode($code);

            $this->bodyProductRepository->update($product);
            $this->productRepository->update($product);

            $this->productAssetRepository->update($product);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
    }



    // Delete
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
