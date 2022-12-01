<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Product_service;
use Illuminate\Http\Request;

class Home_controller extends Controller
{
    private $product_service;

    public function __construct(Product_service $product_service)
    {
        $this->product_service = $product_service;
    }



    public function showProduct()
    {
        $data['listProduct'] = collect($this->product_service->getAll());

        return view('/Home/showProduct', $data);
    }
}
