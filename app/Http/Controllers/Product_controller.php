<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\Category_service;
use App\Services\Product_service;
use App\Services\WhoSeeDemo_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\HistoryCommand;

class Product_controller extends Controller
{
    protected $product_service;
    protected $category_service;
    protected $whoSeeDemo_service;

    function __construct(Product_service $product_service, Category_service $category_service, WhoSeeDemo_service $whoSeeDemo_service)
    {
        $this->product_service = $product_service;
        $this->category_service = $category_service;
        $this->whoSeeDemo_service = $whoSeeDemo_service;
    }



    public function index()
    {
        $listProduct = [];
        foreach ($this->product_service->getAll() as $product) {
            $listProduct[] = [
                'code' => $product->code,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'views' => $this->whoSeeDemo_service->getViews($product->product_id),
                'category_name' => $product->category_name,
                'link_locate_demo' => $product->link_locate_demo
            ];
        }

        // return $listProduct;

        $data['listProduct'] = $listProduct;

        return view('/Product/index', $data);
    }







    public function create()
    {
        $data['listCategory'] =  Category::all();
        return view('/Product/create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20|unique:products',
            'price' => 'required',
            'category' => 'required'
        ]);

        $result =  $this->product_service->add($request->name, $request->price, $request->category);
        if ($result == false) {
            return back()->with('createFailed', "Produk gagal di buat.");
        }

        return redirect('/Product')->with('createSuccess', "Produk berhasil di tambahkan.");
    }







    public function show($code)
    {
        $product = $this->product_service->getByCode($code);
        $id = $this->product_service->getIdByCode($code);

        $data['product'] = [
            'name' => $product->name,
            'price' => $product->price,
            'views' => $this->whoSeeDemo_service->getViews($id),
            'link_locate_demo' => $product->link_locate_demo,
            'created_at' => $product->created_at,
            'category_name' => $product->category_name
        ];

        return view('/Product/show', $data);
    }


    public function uploadTumb(Request $request)
    {
        $picture = $request->file('image');

        $picture->storePubliclyAs('tumbs', 'contoh' . '.' . $picture->getClientOriginalExtension(), 'public_custom');

        return back()->with('successUpload', 'Gambar thumbnail produk berhasil di upload.');
    }



    public function edit($code)
    {
        $product = $this->product_service->get($code);

        if (collect($product)->isEmpty()) {
            return redirect('/Product');
        }

        $data['product'] = $product;
        $data['listCategory'] = $this->category_service->getAll();
        $data['code'] = $code;

        return view('/Product/edit', $data);
    }



    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'required|max:20',
            'price' => 'required',
            'category' => 'required'
        ]);

        $result = $this->product_service->update($code, $request->name, $request->price, $request->category);

        if ($result['isSuccess'] == false) {
            return back()->with('editFailed', $result['message']);
        }

        return redirect('/Product')->with('editSuccess', "Produk berhasil di edit.");
    }






    public function destroy($code)
    {
        $result = $this->product_service->delete($code);
        if ($result == false) {
            return back()->with('deleteFailed', 'Produk gagal di hapus');
        }

        return redirect('/Product')->with('deleteSuccess', 'Produk berhasil di hapus.');
    }
}
