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
        $data['listProduct'] = Product::all();

        return view('/Home/showProduct', $data);
    }
}
