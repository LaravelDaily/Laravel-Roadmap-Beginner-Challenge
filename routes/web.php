<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function (Post $post) {
    $posts = $post->with('category')->paginate(4);
    $category = Category::all();
    return view('welcome', compact(['posts', 'category']));
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::resource('posts', PostController::class);
Route::group(['middleware' => ['auth']], function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});


Auth::routes([
    'register' => false
]);
