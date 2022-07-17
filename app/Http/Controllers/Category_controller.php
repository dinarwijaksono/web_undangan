<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class Category_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['listCategory'] = Category::all();

        return view('/Category/index', $data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Category/create');
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
            'name' => 'required|unique:categories'
        ]);

        $data['name'] = $request->name;
        $data['code'] = 'C' . mt_rand(1000000, 9999999);

        Category::create($data);

        return redirect('/Category')->with('CreateSuccess', 'Kategori berhasil di tambahkan');
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
    public function edit($code)
    {
        $data['category'] = collect(Category::where('code', $code)->get())->first();

        return view('/Category/edit', $data);
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
            'name' => 'required'
        ]);

        $data = ['name' => $request->name];
        Category::where('code', $code)->update($data);

        return redirect('/Category')->with('editSuccess', 'Kategori berhasil di edit.');
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        Category::where('code', $code)->delete();

        return redirect('/Category')->with('deleteSuccess', "Kategori berhasil di hapus.");
    }
}
