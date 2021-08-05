<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{article}', [BlogController::class, 'show'])->name('blog.article');
Route::get('/about', function() { return view('about'); })->name('static.about');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/articles', ArticleController::class);

    Route::resource('/categories', CategoryController::class)
        ->except(['create', 'edit', 'show']);

    Route::resource('/tags', TagController::class)
        ->except(['create', 'edit', 'show']);
});

require __DIR__.'/auth.php';
