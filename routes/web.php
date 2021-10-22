<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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

Route::get('/', function (){
    $articles = Article::paginate(10);
    return view('index', compact('articles'));
})->name('index');

Route::get('/article/{id}', [PageController::class, 'show'])->name('article.show');

Route::view('about', 'about')->name('about');

Route::middleware('auth')->prefix('admin')->group(function(){
    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('tags', TagController::class)->except(['show']);

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes(['register' => false]);

