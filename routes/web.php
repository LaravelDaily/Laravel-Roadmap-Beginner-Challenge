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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('article', \App\Http\Controllers\ArticleController::class);
    Route::resource('tag', \App\Http\Controllers\ArticleController::class);
    Route::resource('category', \App\Http\Controllers\ArticleController::class);
});

require __DIR__ . '/auth.php';
