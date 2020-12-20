<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use DataTables;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
            $cat = new Category();
            $cat = $cat->get();
           // dd($cat);

        return view('category.category_list')->with(compact('cat'));
    }

    public function create(Request $request)
    {
        $cat = new Category();
        $cat->name_th = $request->input('name_th');
        $cat->name_en = $request->input('name_en');
        $cat->save();

        return redirect('category_list');
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
