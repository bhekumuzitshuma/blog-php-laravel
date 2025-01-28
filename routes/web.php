<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('posts', [PostController::class, 'index'])->name('posts.index'); // Public post list
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show'); // View single post

Route::get('categories/{category}/posts', [CategoryController::class, 'showPosts'])->name('categories.posts');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource Routes
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::prefix('posts/{post}')->group(function () {
        Route::resource('comments', CommentController::class)->shallow();
    });
});

require __DIR__.'/auth.php';
