<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\Category_service;
use App\Services\Product_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product_controller extends Controller
{
    protected $product_service;
    protected $category_service;

    function __construct(Product_service $product_service, Category_service $category_service)
    {
        $this->product_service = $product_service;
        $this->category_service = $category_service;
    }



    public function index()
    {
        $listProduct = $this->product_service->getAll();

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
        $product = DB::table('products')
            ->where('products.code', $code)
            ->join('categories', 'categories.id', 'products.category_id')
            ->select('products.name', 'products.price', 'products.link_locate_demo', 'products.created_at', 'categories.name as category_name')
            ->get()[0];

        $product_id = collect(Product::where('code', $code)->get())->first()->id;
        $see = DB::table('who_sees')
            ->where('product_id', $product_id)
            ->select('user_agent', 'created_at')
            ->get();

        $product = collect($product);
        $product['see_count'] = collect($see)->count();

        $data['product'] = $product;

        return view('/Product/show', $data);
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

        $data['name'] = $request->name;
        $data['category_id'] = $request->category;
        $data['price'] = $request->price;
        $data['updated_at'] = round(microtime(true) * 1000);
        DB::table('products')->where('code', $code)->update($data);

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
