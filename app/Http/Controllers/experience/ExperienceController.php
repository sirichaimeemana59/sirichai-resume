<?php

namespace App\Http\Controllers\experience;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume\experience;

class ExperienceController extends Controller
{

    public function index()
    {
        return view ('Resume.experience.experience_list');
    }

    public function create(Request $request)
    {
        foreach ($request->input('data') as $key => $item) {
            $experience = new experience();
            $experience->date_start = $item['date_start'];
            $experience->date_end = $item['date_end'];
            $experience->detail_th = $item['detail_th'];
            $experience->detail_en = $item['detail_en'];
            $experience->save();
        }

        return redirect('exp_list');
        //dd($experience);
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
