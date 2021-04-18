<?php

namespace App\Http\Controllers\CreateUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resume\resume;

class CreateUserControllers extends Controller
{
    public function index()
    {
        $user = new User();
        $user = $user->get();

        return response()->json($user);
    }

    public function login(Request $request)
    {
        //array $data_user = [];
        $user =  User::where('email','=',$request->input('email'))->where('password','=',$request->input('password'));
        $user = $user->get();
        //print_r($request->input('email'));
if($count = count($user) == 0){
    $status = 0;
    $data_user['status']= $status;
    return response()->json($data_user);

}else{
    $status = 1;
    $data_user['user']= $user;
    $data_user['user_name']= $user[0]['name'];
    $data_user['status']= $status;
        return response()->json($data_user);
}
    }

    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return response()->json('success');

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
