<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SessionController;

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

Route::get('/', [ArticleController::Class, 'index'])->name('article.index');
Route::get('/article/{article}', [ArticleController::Class, 'show'])->name('article.show');

Route::get('/login', [SessionController::class, 'create'])->name('session.create')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('session.store')->middleware('guest');
Route::delete('/logout', [SessionController::class, 'destroy'])->name('session.destroy')->middleware('auth');
