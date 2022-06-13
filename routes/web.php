<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
Route::view('/about','pages.about')->name('about');

Route::controller(HomeController::class)->group(function()
{
    Route::get('/','welcome')->withoutMiddleware(['auth'])->name('welcome'); // without auth
        
    Route::get('/home','index')->name('home'); //with auth
});

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}',[App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function()
{
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class)->except(['index', 'show']);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
});

Auth::routes();