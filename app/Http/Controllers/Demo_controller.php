<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class Demo_controller extends Controller
{
    public function product($code)
    {
        $this->addSee($code);

        return view("/Demo/$code/index");
    }



    public function addSee($code)
    {

        $productId = collect(Product::where('link_locate_demo', $code)->get())->first();

        $user_anget = NULL;
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $user_anget = 'Tidak ada data';
        } else {
            $user_anget = $_SERVER['HTTP_USER_AGENT'];
        }

        $data['product_id'] = $productId->id;
        $data['user_agent'] = $user_anget;
        $data['created_at'] = round(microtime(true) * 1000);
        DB::table('who_sees')->insert($data);
    }
}
