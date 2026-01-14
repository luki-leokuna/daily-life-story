<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\Admin\StoryController as AdminStoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public Routes
Route::get('/', [StoryController::class, 'index'])->name('home');
Route::get('/story/{slug}', [StoryController::class, 'show'])->name('story.show');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// --- ROUTE AUTENTIKASI ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('stories', AdminStoryController::class);
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
});