<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DetachTagController;

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
Route::group(['middleware'=>'auth'],function(){
    Route::delete('/tagdetach/{article}/{tag}',DetachTagController::class)->name('tag.detach');
    // Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('category', CategoryController::class)->except(['show']);
    Route::resource('article', ArticleController::class)->except(['show','index']);
});
Route::resource('article', ArticleController::class)->only('show','index');
Route::view('/aboutme', 'aboutme')->name('aboutme');
Route::get('/', function () {
    return view('welcome');
});
require __DIR__.'/auth.php';
