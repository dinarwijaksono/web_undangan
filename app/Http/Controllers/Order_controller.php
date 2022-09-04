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
        //
    }








    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'link_name' => 'required',
            'expired' => 'required'
        ]);

        $data['order_from'] = $request->name;
        $data['expired'] = strtotime($request->expired) * 1000;
        $data['code'] = 'O' . mt_rand(1, 9999999);
        $data['link_locate'] = trim($request->link_name);
        $data['created_at'] = round(microtime(true) * 1000);
        $data['updated_at'] = round(microtime(true) * 1000);

        DB::table('orders')->insert($data);

        abort(200);
        return redirect('/Order/create')->with('createSuccess', "Order baru berhasil di tambahkan.");
    }







    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        abort(200);
        return redirect("/Order/edit/$code")->with('updateSuccess', "Order berhasil di hapus");
    }





    public function destroy($code)
    {
        Order::where('code', $code)->delete();

        abort(200);
        return redirect('/Order')->with('deleteSuccess', "Order berhasil di hapus.");
    }
}
