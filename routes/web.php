<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ArticleController::class, 'indexGuest'])->name('article');


Route::get('/about', function () {
    return view('about');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'index'])->name('article.store');
    Route::resource('articles', ArticleController::class)->except(['show']);
    Route::resource('tag', TagController::class);
    Route::resource('category', CategoryController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

require __DIR__.'/auth.php';
