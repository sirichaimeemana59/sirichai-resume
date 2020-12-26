<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});
//language
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
   // dd($locale);
    return redirect()->back();
});
//Auth

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

//Category
Route::any('category_list','Category\CategoryController@index');
Route::post('/create_category','Category\CategoryController@create');
//Product
Route::any('product_list','Product\ProductController@index');
Route::post('create_product','Product\ProductController@store');
Route::post('/product/list-view','Product\ProductController@show');
Route::post('/product/edit-data','Product\ProductController@edit');
Route::post('/update_product','Product\ProductController@update');
//API Order
Route::any('api_order','APIController\OrderController@index');
