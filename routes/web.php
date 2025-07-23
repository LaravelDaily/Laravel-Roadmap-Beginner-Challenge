<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('post/{post}', [App\Http\Controllers\HomeController::class, 'show'])->name('post.show');
Route::view('/about', 'about')->name('about');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin'], function () {
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class)->except('show')->names('admin.categories');
        Route::resource('tags', App\Http\Controllers\Admin\TagController::class)->except('show')->names('admin.tags');
        Route::resource('posts', App\Http\Controllers\Admin\PostController::class)->except('show')->names('admin.posts');
    });
});

require __DIR__.'/auth.php';
