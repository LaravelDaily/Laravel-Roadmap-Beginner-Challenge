<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;


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

Route::view('/aboutme', 'aboutme')->name('aboutme');

Auth::routes(['register' => false]);

// Guest
Route::get('/', HomeController::class)->name('home');
Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::resources([
        'article' => AdminArticleController::class,
        'tags' => TagController::class,
        'categories' => CategoryController::class
    ], [
        'except' => ['show']
    ]);
});
