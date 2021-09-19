<?php

use App\Http\Controllers\ArticleController;
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

Route::post('articles', [ArticleController::class, 'store']);
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::patch('articles/{article}', [ArticleController::class, 'update']);
Route::delete('articles/{article}', [ArticleController::class, 'destroy']);
