<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\PictureProduct_service;
use App\Services\Product_service;
use Illuminate\Http\Request;

class Home_controller extends Controller
{
    private $product_service;
    private $pictureProduct_service;

    public function __construct(Product_service $product_service, PictureProduct_service $pictureProduct_service)
    {
        $this->product_service = $product_service;
        $this->pictureProduct_service = $pictureProduct_service;
    }



    public function showProduct()
    {
        $products = collect($this->product_service->getAll());

        $listProduct = [];
        foreach ($products as $product) {
            $picture = $this->pictureProduct_service->getByProductId($product->product_id);

            $image = NULL;
            if ($picture['isEmpty'] === false) {
                $image = $picture['data']->locate_file;
            }

            $listProduct[] = [
                'product_name' => $product->product_name,
                'price' => $product->price,
                'category_name' => $product->category_name,
                'link_locate_demo' => $product->link_locate_demo,
                'code' => $product->code,
                'category_id' => $product->category_id,
                'product_id' => $product->product_id,
                'image' => $image
            ];
        }

        $data['listProduct'] = $listProduct;
        return view('/Home/showProduct', $data);
    }
}
