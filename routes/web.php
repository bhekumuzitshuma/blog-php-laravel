<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

// Public Routes (accessible to everyone)
Route::get('posts', [PostController::class, 'index'])->name('posts.index'); // View all posts
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show'); // View single post
Route::get('categories/{category}/posts', [CategoryController::class, 'showPosts'])->name('categories.posts'); // View posts in a category

// Authenticated Routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    // Post Management Routes
    Route::resource('posts', PostController::class)->except(['index', 'show']); // Excludes public routes

    // Nested Comments Routes
    Route::prefix('posts/{post}')->group(function () {
        Route::resource('comments', CommentController::class)->shallow();
    });

    // Categories Management Routes
    Route::resource('categories', CategoryController::class)->except(['show']); // Admin or restricted
});

// Homepage Route
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes (optional, if you use Laravel Breeze or Jetstream)
// require __DIR__ . '/auth.php';
