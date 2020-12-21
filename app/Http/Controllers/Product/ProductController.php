<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Category\Category;

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
        $image = time().'.'.$request->img->extension();

        //$request->img->move(public_path('img'), $image);

       $product = new Product();
       $product->name_th = $request->input('name_th');
       $product->name_en = $request->input('name_en');
       $product->price = $request->input('price');
       $product->amount = $request->input('amount');
       $product->cat_id = $request->input('cat');
       $product->img = $image;
       $product->save();

       return redirect('/product_list');

//        if(!is_null($image)) {
//            return back()->with('success','Success! image uploaded');
//        }
//
//        else {
//            return back()->with("failed", "Alert! image not uploaded");
//        }
    }


    public function show(Request $request)
    {
       // dd($request->input('id'));
       $product = Product::find($request->input('id'));
       $product->get();

       return response()->json($product);

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
