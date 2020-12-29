<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Resume\resume;

class ResumeController extends Controller
{

    public function index()
    {
        $cat = new Category();
        $cat = $cat->get();

        $resume = new resume();
        $resume = $resume->get();


        return view('Resume.resume_index')->with(compact('cat','resume'));
    }

    public function create(Request $request)
    {
        $image = time().'.'.$request->img->extension();
        $request->img->move(public_path('img'), $image);

        $resume = new resume();
        $resume->head_th = $request->input('head_th');
        $resume->head_en = $request->input('head_en');
        $resume->detail_th = $request->input('detail_th');
        $resume->detail_en = $request->input('detail_en');
        $resume->cat_id = $request->input('cat');
        $resume->file = $image;
        $resume->save();
        //dd($resume);

        return redirect('resume_list');
    }


    public function store(Request $request)
    {
        $resume = resume::find($request->input('id'));
        $resume->first();

        $cat = new Category();
        $cat = $cat->get();

        $array['data']['resume']= $resume;
        $array['data']['cat']= $cat;

        return response()->json($array);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $resume = resume::find($request->input('id'));
        $resume->head_th = $request->input('head_th');
        $resume->head_en = $request->input('head_en');
        $resume->detail_th = $request->input('detail_th');
        $resume->detail_en = $request->input('detail_en');
        $resume->cat_id = $request->input('cat');
        $resume->file = 'file';
        $resume->save();
        //dd($resume);

        return redirect('resume_list');
    }

    public function destroy($id)
    {
        //
    }
}
