<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Category\Category;
use DB;

class ProductController extends Controller
{

    public function index()
    {
        $product = new Product();
        $product = $product->get();

        $cat = new Category();
        $cat = $cat->get();
//dd($cat);
        return view('Product.Product_list')->with(compact('product','cat'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }


        $image = time().'.'.$request->img->extension();
        $request->img->move(public_path('img'), $image);
       $product = new Product();
       $product->name_th = $request->input('name_th');
       $product->name_en = $request->input('name_en');
       $product->price = $request->input('price');
       $product->amount = $request->input('amount');
       $product->cat_id = $request->input('cat');
       $product->img = $image;
       $product->save();

        //dd($product);

       return redirect('/product_list');

    }


    public function show(Request $request)
    {
        $product = DB::table('product')
            ->where('product.id','=',$request->input('id'))
            ->join('category','category.id','=','product.cat_id')
            ->select('product.*','category.name_th as name_cat_th','category.name_en as name_cat_en')
            ->get();

       return response()->json($product);

    }


    public function edit(Request $request)
    {
        $product = DB::table('product')
            ->where('product.id','=',$request->input('id'))
            ->join('category','category.id','=','product.cat_id')
            ->select('product.*','category.name_th as name_cat_th','category.name_en as name_cat_en')
            ->get();

        $cat = new Category();
        $cat = $cat->get();

        $array['data']['product']=$product;
        $array['data']['cat']=$cat;

        return response()->json($array);
    }


    public function update(Request $request)
    {
        $image = time().'.'.$request->img->extension();
        $request->img->move(public_path('img'), $image);
        $product = Product::find($request->input('id'));
        $product->name_th = $request->input('name_th');
        $product->name_en = $request->input('name_en');
        $product->price = $request->input('price');
        $product->amount = $request->input('amount');
        $product->cat_id = $request->input('cat');
        $product->img = $image;
        $product->save();

        return redirect('/product_list');
    }


    public function destroy($id)
    {
        //
    }
}
