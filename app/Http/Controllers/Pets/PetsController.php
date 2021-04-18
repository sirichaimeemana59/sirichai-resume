<?php

namespace App\Http\Controllers\Pets;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pets\PetModel;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pet = new PetModel();
        $pet = $pet->get()->sortBy('create_at');

        return response()->json($pet);
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
        $pet = new PetModel();
        $pet->name = $request->input('name');
        $pet->age = $request->input('age');
        $pet->photo = 'photo.png';
        $pet->note = $request->input('note');
        $pet->save();

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
        //dd($id);
        $pet = PetModel::find($id);
        $pet->first();

        //dd(count($pet));

        if(!empty($pet)){
            $status = 1;
            $data['status']= $status;
            $data['data']=$pet;
        }else{
            $status = 0;
            $data['status']= $status;
        }


        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       // dd($request->input('id'));
        $pet = PetModel::find($request->input('id'));
        $pet->name = $request->input('name');
        $pet->age = $request->input('age');
        $pet->photo = $request->input('photo');
        $pet->note = $request->input('note');
        $pet->save();

        return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pet = PetModel::find($id);
        $pet->delete();

        return response()->json('1');
    }
}
