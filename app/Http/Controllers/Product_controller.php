<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Link;
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

        $code = 'P' . mt_rand(1000000, 9999999);
        $data['code'] = $code;
        $data['name'] = $request->name;
        $data['category_id'] = $request->category;

        Product::create($data);

        $product = collect(Product::where('code', $code)->get())->first();
        $data2['locate'] = 'D' . mt_rand(1, 9999);
        $data2['tipe'] = 'demo';
        $data2['product_id'] = $product->id;

        Link::create($data2);

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
        $data['product'] = collect(Product::where('code', $code)->get())->first();
        $data['listCategory'] = Category::all();
        $data['code'] = $code;

        return view('/Product/edit', $data);
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

        return redirect('/Product')->with('editSuccess', "Produk berhasil di edit.");
    }






    public function destroy($code)
    {
        $product_id = collect(Product::where('code', $code)->get())->first();
        Link::where('product_id', $product_id->id)->delete();
        Product::where('code', $code)->delete();

        return redirect('/Product')->with('deleteSuccess', 'Produk berhasil di hapus.');
    }
}
