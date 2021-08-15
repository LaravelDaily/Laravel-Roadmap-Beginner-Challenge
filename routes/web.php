<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
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

//all frontend routes with callback function
Route::get('/', function () {
    return view('welcome', ['articles' => Article::with('category', 'tags')->latest()->take(5)->get()]);
});

Route::get('articles', function () {
    return view('articles', [
        'title' => null,
        'articles' => Article::with('category', 'tags')->latest()->paginate(10)
    ]);
})->name('articles.index');

Route::get('articles/{article:slug}', function (Article $article) {
    return view('show', [
        'article' => $article
    ]);
})->name('articles.show');

Route::get('tags/{tag:slug}/articles', function (Tag $tag) {
    return view('articles', [
        'title' => $tag->name,
        'articles' => $tag->articles()->with('category', 'tags')->latest()->paginate(10)
    ]);
})->name('tags.articles.index');

Route::get('categories/{category:slug}/articles', function (Category $category) {
    return view('articles', [
        'title' => $category->name,
        'articles' => $category->articles()->with('category', 'tags')->latest()->paginate(10)
    ]);
})->name('categories.articles.index');

//static page
Route::get('about', function (){
    return view('pages.about');
})->name('about');


//disable registration
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route group
Route::group(['prefix' => 'backend', 'as' => 'backend.', 'middleware' => 'auth'], function(){
    Route::resource('articles', ArticleController::class)->except('show');//disable show operation
    Route::resource('categories', CategoryController::class)->except('show');//disable show operation
    Route::resource('tags', TagController::class)->except('show');//disable show operation
});
