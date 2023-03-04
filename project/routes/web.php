<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/articles');

Auth::routes();
Route::view('about', 'about')->name('about');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('articles', ArticleController::class);
Route::resource('articles', ArticleController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware(['auth', 'admin']);
Route::resource('tags', TagController::class)->middleware(['auth', 'admin']);
