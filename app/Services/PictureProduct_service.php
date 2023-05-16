<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repository\PictureProduct_repository;
use Illuminate\Support\Facades\Storage;

class PictureProduct_service
{
    private $pictureProductRepository;

    function __construct(PictureProduct_repository $pictureProduct_repository)
    {
        $this->pictureProductRepository = $pictureProduct_repository;
    }


    public function create(int $productId, string $locateFile): void
    {
        $this->pictureProductRepository->create($productId, $locateFile);
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



    public function deleteByLocateFile(string $locate): void
    {
        $this->pictureProductRepository->deleteByLocateFile($locate);

        Storage::disk('public_custom')->delete($locate);
    }
}
