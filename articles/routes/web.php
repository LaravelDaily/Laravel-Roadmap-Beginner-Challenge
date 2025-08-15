<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(
    [
        "register" => false
    ]
);
    
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']] , function(){

Route::resource('tag','TagController');
Route::resource('category','CategoryController');
Route::resource('post','PostController');
});