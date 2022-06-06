<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Pages\ManagePages;
use App\Http\Livewire\Posts\ManagePosts;
use App\Http\Livewire\Category\ManageCategories;
use App\Http\Controllers\ManageSubscriberController;
use App\Http\Livewire\Subscriber\VerifySubscriber;

/*
* Guest Routes
*/
Route::get('/', HomeController::class);
Route::resource('/subscribers',ManageSubscriberController::class);
Route::get('/verifyOTP/{id}/{otp}', VerifySubscriber::class);


/*
* App Routes
*/
Route::middleware('auth')->group(function () {
    Route::get('/pages', ManagePages::class);
    Route::get('/posts', ManagePosts::class);
    Route::get('/categories', ManageCategories::class);
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    });


// ---------


require __DIR__.'/auth.php';


// Route::resource('posts',ManagePostsController::class);
// Route::resource('categories',CategoryController::class);