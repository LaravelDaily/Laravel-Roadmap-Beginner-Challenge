<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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



Route::get('/about-me', function () {
    return view('pages.about-me');
})->name('about-me');

Route::prefix('/dashboard')->middleware(['auth'])->group(function () {

    // show dashboard
    Route::get('/', function () {
        return view('pages.dashboard.dashboard');
    })->name('dashboard');


    Route::prefix('/article')->group(function () {
        Route::get('/', [ArticleController::class, 'article_manager'])->name('article_manager');
        Route::post('/', [ArticleController::class, 'store'])->name('article_manager.store');
        Route::get('/create', [ArticleController::class, 'create'])->name('article_manager.create');
        Route::get('/edit', [ArticleController::class, 'editIndex'])->name('article_manager.edit_list');
        Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article_manager.edit');
        Route::post('/edit/{id}', [ArticleController::class, 'update'])->name('article_manager.update');
        Route::post('/delete/{id}', [ArticleController::class, 'destroy'])->name('article_manager.delete');
    });

    Route::resource('/category', CategoryController::class);
    Route::post('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::prefix('tag')->name('tag.')->group(function () {
        Route::get('/', [TagController::class, 'create'])->name('create');
        Route::post('/{id}/delete', [TagController::class, 'destroy'])->name('destroy');
        Route::post('/', [TagController::class, 'store'])->name('store');
    });
});


require __DIR__ . '/auth.php';

Route::get('/', [ArticleController::class, 'index'])->name('article-index');
Route::get('/{id}', [ArticleController::class, 'show'])->name('article-show');
