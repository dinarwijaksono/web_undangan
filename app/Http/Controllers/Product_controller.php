<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\WhoSee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product_controller extends Controller
{
    public function index()
    {
        $listProduct = [];

        foreach (Product::all() as $product) {

            $listProduct[] = [
                'name' => $product->name,
                'price' => $product->price,
                'see' => collect($product->whosee)->count(),
                'categoryName' => $product->category->name,
                'link_locate_demo' => $product->link_locate_demo,
                'code' => $product->code
            ];
        }

        $data['listProduct'] = $listProduct;

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
            'name' => 'required|max:20',
            'price' => 'required',
            'category' => 'required'
        ]);

        $code = 'P' . mt_rand(1000000, 9999999);
        $data['category_id'] = $request->category;
        $data['code'] = $code;
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        // $data['see'] = 0;
        $data['link_locate_demo'] = 'P_' . mt_rand(1, 9999);
        $data['created_at'] = round(microtime(true) * 1000);
        $data['updated_at'] = round(microtime(true) * 1000);

        DB::table('products')->insert($data);

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
        $data['product'] = collect(Product::where('code', $code)->get())->first();
        $data['listCategory'] = Category::all();
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
        Product::where('code', $code)->delete();

        return redirect('/Product')->with('deleteSuccess', 'Produk berhasil di hapus.');
    }
}
