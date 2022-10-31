<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::get('/', HomeController::class)->name('home');

Route::resource('articles', ArticleController::class);
Route::resource('tags', TagController::class);
Route::resource('categories', CategoryController::class);
