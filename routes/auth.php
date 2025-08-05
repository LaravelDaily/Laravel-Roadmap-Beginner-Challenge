<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/article', 'middleware' => 'auth:web'], function () {
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/index', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/{id}/removeImage', [ArticleController::class, 'removeImage'])->name('article.removeImage');
    Route::put('/{id}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/{id}/destroy', [ArticleController::class, 'destroy'])->name('article.destroy');
});

Route::group(['prefix' => '/category', 'middleware' => 'auth:web'], function () {
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::group(['prefix' => '/tag', 'middleware' => 'auth:web'], function () {
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/index', [TagController::class, 'index'])->name('tag.index');
    Route::get('/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/{id}/update', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/{id}/destroy', [TagController::class, 'destroy'])->name('tag.destroy');
});

Route::middleware('guest')->group(function () {
    //    Route::get('register', [RegisteredUserController::class, 'create'])
    //                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
