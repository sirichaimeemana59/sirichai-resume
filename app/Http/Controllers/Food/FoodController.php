<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\Shop\ShopModel;
use Illuminate\Http\Request;
use App\Models\foodShopModel\foodShopModel;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $food = foodShopModel::where('shop_id','=',$id);
        $food = $food->get()->sortBy('create_at');

         $count =count($food);

    if($count != 0){
        $data['status'] = '1';
        $data['food'] = $food;
        return response()->json($data);
    }else{
        $data['status'] = '0';
        return response()->json($data);
    }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new foodShopModel();
        $food->name_th = $request->input('name_th');
        $food->name_en = $request->input('name_en');
        $food->detail_th = $request->input('detail_th');
        $food->detail_en = $request->input('detail_en');
        $food->price = $request->input('price');
        $food->shop_id = $request->input('shop_id');
        $food->save();

        return response()->json('success');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
