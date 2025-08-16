<?php

use App\Http\Controllers\{
    ArticleController,
    CategoryController,
    TagController
};
use App\Models\Article;
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
    $articles = Article::with('category')->paginate(15);
    return view('welcome', compact('articles'));
})->name('welcome');

Route::get('/about', function(){
   return view('about');
})->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resources([
        'categories' => CategoryController::class,
        'tags' => TagController::class,
        'articles' => ArticleController::class
    ]);
    Route::get('lang/{lang}', function($lang){
        App::setLocale($lang);
       return redirect()->back();
    });
});
