<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Order_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['listOrder'] = collect(Order::all())->sortBy('expired');

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

        $data['order_from'] = $request->order_from;
        $data['expired'] = strtotime($request->expired) * 1000;
        $data['code'] = 'O' . mt_rand(1, 9999);
        $data['link_locate'] = trim($request->link_name);
        $data['created_at'] = round(microtime(true) * 1000);
        $data['updated_at'] = round(microtime(true) * 1000);

        DB::table('orders')->insert($data);

        return redirect('/Order')->with('createSuccess', "Order baru berhasil di tambahkan.");
    }






    public function show($link)
    {
        $order = collect(Order::where('link_locate', $link)->get())->first();

        return $order->link_locate;
    }





    public function edit($code)
    {
        $data['order'] = collect(Order::where('code', $code)->get())->first();

        return view('/Order/edit', $data);
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'required|max:50',
            'link_name' => 'required',
            'expired' => 'required'
        ]);

        $data['order_from'] = $request->name;
        $data['expired'] = strtotime($request->expired) * 1000;
        $data['link_locate'] = trim($request->link_name);
        $data['updated_at'] = round(microtime(true) * 1000);

        DB::table('orders')->where('code', $code)->update($data);

        return redirect("/Order/edit/$code")->with('updateSuccess', "Order berhasil di edit.");
    }





    public function destroy($code)
    {
        Order::where('code', $code)->delete();

        return redirect('/Order')->with('deleteSuccess', "Order berhasil di hapus.");
    }
}
