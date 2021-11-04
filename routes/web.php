<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/articles/{article}', [HomeController::class, 'article'])->name('articles.view');

Route::get('/about-me', function () {
    return view('about-me');
})->name('about-me');

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/articles/{article}/imageDestroy', [ArticleController::class, 'deleteImage'])->name('articles.imageDestroy');

    Route::resources([
        'categories' => CategoryController::class,
        'tags' => TagController::class,
        'articles' => ArticleController::class,
    ]);
});

require __DIR__.'/auth.php';
