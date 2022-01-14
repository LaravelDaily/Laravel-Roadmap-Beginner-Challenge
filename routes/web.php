<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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

Route::get('/', function () {

    $posts = Post::latest()->get();

    return view('welcome', compact(['posts']));
})->name('home');


Route::view('about', 'about')->name('about');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin'], function () {

    Route::resource('posts', AdminPostController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('tags', AdminTagController::class);

});


require __DIR__ . '/auth.php';
