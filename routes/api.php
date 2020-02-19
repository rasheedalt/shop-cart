<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'AuthController@register');
Route::post('/logout', 'AuthController@logout');
Route::post('/login', 'AuthController@login');
Route::get('/products', 'ProductController@products');

Route::group(['middleware' => 'jwt.auth'], function(){
        Route::group(['prefix' => 'product'], function(){
        Route::post('/add', 'ProductController@addProduct');
        Route::post('/edit/{id}', 'ProductController@editProduct');
        Route::delete('/remove/{id}', 'ProductController@deleteProduct');
      });

    Route::group(['prefix' => 'cart'], function(){
    Route::get('/add/{id}', 'CartController@addToCart');
    Route::get('/mycart', 'CartController@myCart');
    Route::delete('/remove/{id}', 'CartController@removeFromCart');
    });

});


      
