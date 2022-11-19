<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Order_service;
use App\Services\WhoSeeProduct_service;

class WebUndangan_controller extends Controller
{
    public $order_service;
    public $whoSeeProduct_service;

    public function __construct(Order_service $order_serivce, WhoSeeProduct_service $whoSeeProduct_service)
    {
        $this->order_service = $order_serivce;
        $this->whoSeeProduct_service = $whoSeeProduct_service;
    }


    public function index($link)
    {
        $order = $this->order_service->getByLink($link);
        $id = $this->order_service->getIdByCode($order->code);

        if (empty($order)) {
            return redirect('/');
        }

        $user_agent = NULL;
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $user_agent = 'Tidak ada data';
        } else {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
        }

        $this->whoSeeProduct_service->add($id, $user_agent);

        return view("/web_undangan/$order->link_locate/index");
    }
}
