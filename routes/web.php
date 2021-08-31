<?php
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleAdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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
    // if you don’t put with() here, you will have N+1 query performance problem
    $articles = Article::with('category', 'tags')->take(5)->latest()->get();

    return view('pages.home', compact('articles'));
})->name('home');

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::view('aboutme', 'pages.aboutme')->name('aboutme');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('articles', ArticleAdminController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});

require __DIR__.'/auth.php';
