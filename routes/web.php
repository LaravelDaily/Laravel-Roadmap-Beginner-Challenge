<?php

use App\Http\Controllers;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\PostController as HomePostController;

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



Route::get('/', [HomePostController::class, 'index'])->name('home');
Route::get('posts/byTag-{tagName}', [HomePostController::class, 'showByTagName'])->name('showByTagName');
Route::get('posts/byCategory-{categoryId}', [HomePostController::class, 'showByCategoriesId'])->name('showByCategoriesId');
Route::get('post/{id}', [HomePostController::class, 'show'])->name('post');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('tags',TagController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('posts',PostController::class);
});




require __DIR__.'/auth.php';
