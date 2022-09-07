<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Demo_controller extends Controller
{
    public function product($code)
    {
        $this->addSee($code);

        return view("/Demo/$code/index");
    }



    public function addSee($code)
    {
        $product = collect(Product::where('link_locate_demo', $code)->get())->first();

        $data['see'] = $product->see + 1;

        DB::table('products')->where('link_locate_demo', $code)->update($data);
    }
}
