<?php

namespace App\Http\Controllers;

use App\Services\Product_service;
use App\Services\WhoSeeDemo_service;
use Directory;

class Demo_controller extends Controller
{
    protected $product_service;
    protected $whoSeeDemo_service;

    function __construct(Product_service $product_service, WhoSeeDemo_service $whoSeeDemo_service)
    {
        $this->product_service = $product_service;
        $this->whoSeeDemo_service = $whoSeeDemo_service;
    }



    public function showDemoProduct($link)
    {
        $user_agent = NULL;
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $user_agent = 'Tidak ada data';
        } else {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
        }

        $data['product'] = $this->product_service->getByLinkLocateDemo($link);

        // $this->whoSeeDemo_service->add($data['product']->id, $user_agent);

        // if (!is_dir(__DIR__ . '/../../../resources/views/Demo/' . $link)) {
        //     return view("/Demo/alternatives");
        // }

        return view("/Demo/showDemo", $data);
    }
}
