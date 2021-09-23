<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TagArticleController;
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

Route::get('/', [GuestController::class, 'home'])->name('guest.home');
Route::get('/about', [GuestController::class, 'about'])->name('guest.about');
Route::get('/articles/{article}', [GuestController::class, 'show'])->name('guest.show');

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('admin')->group(function () {
    Route::resource('articles', ArticleController::class);
    Route::resource('tags', TagController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);

    Route::get('tags/{tag}/articles', [TagArticleController::class, 'index'])->name('tags.articles.index');
});

// TODO: Add middlewares to routes that should only be accesible to the logged in user
