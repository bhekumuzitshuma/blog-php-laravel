<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

Route::middleware('auth')->group(function () {
    // Post Routes
    Route::resource('posts', PostController::class);

    // Nested Comments Routes
    Route::prefix('posts/{post}')->group(function () {
        Route::resource('comments', CommentController::class)->shallow();
    });

    // Categories Routes
    Route::resource('categories', CategoryController::class)->except(['show']);
});

Route::get('categories/{category}/posts', [CategoryController::class, 'showPosts'])->name('categories.posts');

Route::get('/', function () {
    return view('welcome');
});
