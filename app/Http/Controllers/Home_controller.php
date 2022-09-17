<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Home_controller extends Controller
{
    public function index()
    {
        return view('Home/index');
    }


    public function showProduct()
    {
        $data['active'] = 'showProduct';
        $data['listProduct'] = $this->listProduct();

        return view('/Home/showProduct', $data);
    }


    public function listProduct()
    {
        $products = [];
        foreach (Product::all() as $product) {
            $products[] = [
                'name' => $product->name,
                'link_locate_demo' => $product->link_locate_demo,
                'seeCount' => collect($product->whosee)->count()
            ];
        }

        return $products;
    }
}
