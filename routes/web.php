<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

Route::get('/', [PostController::class, 'index']);

Auth::routes();

Route::view('about', 'about')->name('about');

Route::group([
    'middleware' => 'auth', 
    'prefix' => 'admin', 
    'as' => 'admin.'
    ], function() {
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('posts', AdminPostController::class);
        Route::resource('tags', AdminTagController::class);
});
