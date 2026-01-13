<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\Admin\StoryController as AdminStoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

// Public Routes
Route::get('/', [StoryController::class, 'index'])->name('home');
Route::get('/story/{slug}', [StoryController::class, 'show'])->name('story.show');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('stories', AdminStoryController::class);
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
});