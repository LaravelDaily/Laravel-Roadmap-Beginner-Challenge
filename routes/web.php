<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('post/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('category/{id}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('tag/{id}', [TagController::class, 'index'])->name('tags.index');
Route::view('about', 'about')->name('about');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', function () {
        $post_count = Post::count();
        $category_count = Category::count();
        $tag_count = Tag::count();
        return view('admin.dashboard', compact('post_count', 'category_count', 'tag_count'));
    })->name('dashboard');

    Route::resource('categories', AdminCategoryController::class);
    Route::resource('tags', AdminTagController::class);
    Route::resource('posts', AdminPostController::class);
});

require __DIR__ . '/auth.php';
