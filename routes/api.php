<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});

Route::post('/user/login','UserController@login'); // user login
Route::get('/user/products/{id}','UserController@getUserProducts')->name('get.user.products'); // get products of user 
Route::apiResource('/user','UserController');

Route::apiResource('/products','ProductController');
Route::group(['prefx'=>'products'],function(){

        Route::apiResource('/{product}/reviews','ReviewController');

});