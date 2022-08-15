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


// Front-end Routes 
Route::get('/', function () {
    return view('index');
})->name('front.index');

Route::get('/about', function() {
    return view('about');
})->name('front.about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
