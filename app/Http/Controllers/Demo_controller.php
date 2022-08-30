<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Demo_controller extends Controller
{
    public function product_1()
    {
        return view('/Demo/product_1/index');
    }
}
