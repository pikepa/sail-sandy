<?php

use App\Http\Livewire\Posts\ShowPost;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Posts\ShowVaultPosts;
use App\Http\Livewire\Pages\DashStandardPage;
use App\Http\Livewire\Posts\ShowCategoryPosts;
use App\Http\Livewire\Links\ManageLinks;
use App\Http\Livewire\Subscriber\VerifySubscriber;
use App\Http\Controllers\ManageSubscriberController;

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
Route::get('/category/posts/{cat_slug}', ShowCategoryPosts::class)->name('categoryposts');
Route::get('/vault/', ShowVaultPosts::class)->name('posts.vault');

/*
* App Routes
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashStandardPage::class)->name('dashboard');
    Route::get('/links', ManageLinks::class)->name('links');
});

// ---------

require __DIR__.'/auth.php';

// Route::resource('posts',ManagePostsController::class);
// Route::resource('categories',CategoryController::class);
