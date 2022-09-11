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


// Frontend Routes 
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('front.index');
Route::get('/article/{id}', [App\Http\Controllers\IndexController::class, 'show'])->name('front.article');

Route::get('/about', function() {
    return view('about');
})->name('front.about');

Auth::routes();

//Backend Routes
Route::group(['middleware' => 'auth'], function() {
    Route::resource('articles', App\Http\Controllers\ArticleController::class);
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('tags', App\Http\Controllers\TagController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
