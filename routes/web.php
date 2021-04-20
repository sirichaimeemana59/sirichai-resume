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
//API Firebase
Route::get('/test','FirebaseController@index');
//Resume
Route::any('resume_list','Resume\ResumeController@index');
Route::post('resume_create','Resume\ResumeController@create');
Route::post('/resume/edit-data','resume\ResumeController@store');
Route::post('resume_update','Resume\ResumeController@update');
//experience
Route::any('exp_list','experience\ExperienceController@index');
Route::post('exp_create','experience\ExperienceController@create');


//Create User Mobile
Route::get('/token', function () {
    return csrf_token();
});
Route::post('user_create_user','CreateUser\CreateUserControllers@store');
Route::get('mobile_user_list','CreateUser\CreateUserControllers@index');
Route::post('mobile_user_login','CreateUser\CreateUserControllers@login');
//Create pets
Route::post('user_create_pets','Pets\PetsController@store');
Route::get('user_lit_pets','Pets\PetsController@index');
Route::get('user_get_detail_pets/{id?}','Pets\PetsController@edit');
Route::get('user_delete_detail_pets/{id?}','Pets\PetsController@destroy');
Route::any('user_update_pets','Pets\PetsController@update');
//Create Shop
Route::post('user_create_shop','ShopController\ShopController@store');
Route::get('user_list_shop','ShopController\ShopController@index');
