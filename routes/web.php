<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagePostsController;
use App\Http\Controllers\ManageSubscriberController;


Route::get('/', HomeController::class);


Route::resource('posts',ManagePostsController::class);
Route::resource('subscribers',ManageSubscriberController::class);


// ---------


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
