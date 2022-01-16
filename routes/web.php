<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::view('about', 'about')->name('about');

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin'], function () {

    Route::resource('posts', AdminPostController::class);
    Route::resource('categories', AdminCategoryController::class)->except('show');
    Route::resource('tags', AdminTagController::class)->except('show');

});


require __DIR__ . '/auth.php';
