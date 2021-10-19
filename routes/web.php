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

Route::get('/', [ArticleController::class, 'index']);


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
    });
});


require __DIR__ . '/auth.php';
