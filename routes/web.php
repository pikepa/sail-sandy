<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Pages\ManagePages;
use App\Http\Livewire\Posts\ManagePosts;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManagePostsController;
use App\Http\Livewire\Category\ManageCategories;
use App\Http\Controllers\ManageSubscriberController;

Route::get('/', HomeController::class);


// Route::resource('posts',ManagePostsController::class);
// Route::resource('subscribers',ManageSubscriberController::class);
// Route::resource('categories',CategoryController::class);

Route::middleware('auth')->group(function () {
    Route::get('/pages', ManagePages::class);
    Route::get('/posts', ManagePosts::class);
    Route::get('/categories', ManageCategories::class);
    });


// ---------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

