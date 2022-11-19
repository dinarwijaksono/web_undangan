<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Who_see_order;
use App\Services\Order_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Order_controller extends Controller
{
    protected $order_service;

    function __construct(Order_service $order_service)
    {
        $this->order_service = $order_service;
    }




    public function index()
    {
        $data['listOrder'] = $this->order_service->getAll();

        return view('Order/index', $data);
    }



    public function create()
    {
        return view('Order/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_from' => 'required|max:50',
            'link_name' => 'required',
            'expired' => 'required'
        ]);

        $expired = strtotime($request->expired) * 1000;
        $result = $this->order_service->add($request->order_from, $request->link_name, $expired);

        if ($result['isSuccess'] == false) {
            return back()->with('createFailed', $result['message']);
        }

        return redirect('/Order')->with('createSuccess', "Order baru berhasil di tambahkan.");
    }






    public function show($link)
    {
        $order = collect(Order::where('link_locate', $link)->get())->first();

        // Tambah kan who_see_order
        $user_anget = NULL;
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $user_anget = 'Tidak ada data';
        } else {
            $user_anget = $_SERVER['HTTP_USER_AGENT'];
        }
        $insert['order_id'] = $order->id;
        $insert['user_agent'] = $user_anget;
        $insert['created_at'] = round(microtime(true) * 1000);
        Who_see_order::insert($insert);


        return $order->link_locate;
    }





    public function edit($code)
    {
        $data['order'] = $this->order_service->getByCode($code);

        return view('/Order/edit', $data);
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'order_from' => 'required|max:50',
            'link_name' => 'required',
            'expired' => 'required'
        ]);

        // print_r('damayanti');

        $expired = strtotime($request->expired) * 1000;
        $link_locate = trim($request->link_name);

        $result = $this->order_service->update($code, $request->order_from, $link_locate, $expired);
        if ($result['isSuccess'] == false) {
            return back()->with('updateFailed', $result['message']);
        }

        return back()->with('updateSuccess', "Order berhasil di edit.");
    }





    public function destroy($code)
    {
        $this->order_service->delete($code);

        return redirect('/Order')->with('deleteSuccess', "Order berhasil di hapus.");
    }
}
