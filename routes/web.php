<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageSubscriberController;
use App\Http\Livewire\Category\ManageCategories;
use App\Http\Livewire\Pages\ManagePages;
use App\Http\Livewire\Posts\ManagePosts;
use App\Http\Livewire\Posts\ShowPost;
use App\Http\Livewire\Subscriber\VerifySubscriber;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('test');
});

/*
* Guest Routes
*/
Route::get('/', HomeController::class)->name('home');
Route::resource('/subscribers', ManageSubscriberController::class);
Route::get('/verifyOTP/{id}/{otp}', VerifySubscriber::class);
Route::get('/posts/{slug}', ShowPost::class)->name('showpost');

/*
* App Routes
*/
Route::middleware('auth')->group(function () {
    Route::get('/posts', ManagePosts::class);
    Route::get('/pages', ManagePages::class);
    Route::get('/categories', ManageCategories::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ---------

require __DIR__.'/auth.php';

// Route::resource('posts',ManagePostsController::class);
// Route::resource('categories',CategoryController::class);
