<?php

namespace App\Http\Controllers;

use App\Services\Product_service;
use App\Services\WhoSeeDemo_service;

class Demo_controller extends Controller
{
    protected $product_service;
    protected $whoSeeDemo_service;

    function __construct(Product_service $product_service, WhoSeeDemo_service $whoSeeDemo_service)
    {
        $this->product_service = $product_service;
        $this->whoSeeDemo_service = $whoSeeDemo_service;
    }



    public function product($link)
    {
        $user_agent = NULL;
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $user_agent = 'Tidak ada data';
        } else {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
        }

        $product = $this->product_service->getByLink($link);

        $this->whoSeeDemo_service->add($product->id, $user_agent);

        return view("/Demo/$link/index");
    }
}
