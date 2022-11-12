<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Category_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category_controller extends Controller
{
    private $category_service;

    function __construct(Category_service $category_service)
    {
        $this->category_service = $category_service;
    }



    public function index()
    {
        $data['listCategory'] = $this->category_service->getAll();

        return view('/Category/index', $data);
    }




    public function create()
    {
        return view('/Category/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:30'
        ]);

        $this->category_service->addCategory($request->name);

        return redirect('/Category')->with('CreateSuccess', 'Kategori berhasil di tambahkan');
    }




    public function edit($code)
    {
        $category = $this->category_service->get($code);

        if (collect($category)->isEmpty()) {
            return redirect('/Category');
        }

        $data['category'] = $category;

        return view('/Category/edit', $data);
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'required|max:30'
        ]);

        $result = $this->category_service->update($code, $request->name);

        if ($result == false) {
            return redirect('/Category/edit/' . $code)->with('editFailed', 'Anda tidak melakukan perubahan apapun.');
        }

        return redirect('/Category')->with('editSuccess', 'Kategori berhasil di edit.');
    }





    public function destroy($code)
    {
        $result = $this->category_service->delete($code);

        if ($result == false) {
            return redirect('/Category')->with('deleteFailed', "Kategori gagal di hapus.");
        }

        return redirect('/Category')->with('deleteSuccess', "Kategori berhasil di hapus.");
    }
}
