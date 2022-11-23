<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
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
Route::view('about-me', 'aboutMe')->name('aboutMe');
Route::get('/homepage', HomeController::class)->name('homepage');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::middleware('auth')->group(function () {
    Route::resources([
        '/articles' => ArticleController::class,
        '/categories' => CategoryController::class,
        '/tags' => TagController::class
    ], [
        'parameters' => [
            'articles' => 'article:slug',
            'categories' => 'category:slug',
            'tags' => 'tag:slug'
        ],
        'except' => ['show']
    ]);
});

// Route
require __DIR__ . '/auth.php';
