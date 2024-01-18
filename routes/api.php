<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::prefix('auth')->namespace('App\Http\Controllers')->group(function () {
Route::namespace('App\Http\Controllers')->group(function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register');  
    
    //Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@login');       
            
        Route::get('user', 'UserController@index')->name('user.index');  
        Route::get('user/{id}', 'UserController@show')->name('user.show');  
        Route::post('user', 'UserController@store')->name('user.store');        
        Route::put('user', 'UserController@update')->name('user.update');
        Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');  

        Route::get('product', 'ProductController@index')->name('product.index');
        Route::get('product/{id}', 'ProductController@show')->name('product.show');  
        Route::post('product', 'ProductController@store')->name('product.store');
        Route::put('product', 'ProductController@update')->name('product.update');
        Route::delete('product/{id}', 'ProductController@destroy')->name('product.destroy');  
        
    //});
});


