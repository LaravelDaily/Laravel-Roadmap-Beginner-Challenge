<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\Post;
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

// callback
Route::get('/', function(){
    return view('home', ['posts' => Post::with('category')->get()]);
})->name('home');

// view
Route::view('/about', 'about')->name('about');

// resource
Route::group(['middleware' => 'auth'], function() {
    Route::resources([
        'category' => CategoryController::class,
        'post' => PostController::class,
        'tag' => TagController::class,
    ]);
});

// post show is public
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

// auth except register
require __DIR__.'/auth.php';
