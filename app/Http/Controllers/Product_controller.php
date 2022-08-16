<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Product_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['listProduct'] = collect(Product::all());

        return view('/Product/index', $data);
    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['listCategory'] =  Category::all();
        return view('/Product/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required'
        ]);

        $data['code'] = 'P' . mt_rand(1000000, 9999999);
        $data['name'] = $request->name;
        $data['category_id'] = $request->category;

        Product::create($data);

        return redirect('/Product')->with('createSuccess', "Produk berhasil di tambahkan.");
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






    public function edit($code)
    {
    }



    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['category_id'] = $request->category;
        Product::where('code', $code)->update($data);
    }






    public function destroy($code)
    {
        Product::where('code', $code)->delete();

        return redirect('/Product')->with('deleteSuccess', 'Produk berhasil di hapus.');
    }
}
