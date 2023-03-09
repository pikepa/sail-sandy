<?php

use App\Http\Livewire\Posts\ShowPost;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Links\ManageLinks;
use App\Http\Livewire\Posts\ManagePosts;
use App\Http\Controllers\WpApiController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\Posts\ShowVaultPosts;
use App\Http\Livewire\Pages\DashStandardPage;
use App\Http\Livewire\Posts\ShowChannelPosts;
use App\Http\Livewire\Posts\ShowCategoryPosts;
use App\Http\Livewire\Subscriber\VerifySubscriber;
use App\Http\Controllers\ManageSubscriberController;

Route::get('/test', WpApiController::class);

/*
* Guest Routes
*/
Route::get('/', WelcomeController::class)->name('welcome');
Route::get('/home', HomeController::class)->name('home');
Route::resource('/subscribers', ManageSubscriberController::class);
Route::post('/verifyOTP/{id}/{otp}', VerifySubscriber::class);
Route::get('/posts/{slug}', ShowPost::class)->name('showpost');
Route::get('/category/posts/{cat_slug}', ShowCategoryPosts::class)->name('categoryposts');
Route::get('/channel/posts/{chan_slug}', ShowChannelPosts::class)->name('channelposts');
Route::get('/vault/', ShowVaultPosts::class)->name('posts.vault');

/*
* App Routes
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashStandardPage::class)->name('dashboard');
    Route::get('/dashboard/posts/{post_id}', ManagePosts::class)->name('dashboard.edit.post');
    Route::get('/links', ManageLinks::class)->name('links');
});

// ---------

require __DIR__.'/auth.php';

// Route::resource('posts',ManagePostsController::class);
// Route::resource('categories',CategoryController::class);

Route::get('rss', function () {
    $source = 'http://bomborra.asia/wp-json';

    $headers = get_headers($source);
    $response = substr($headers[0], 9, 3);
    if ($response == '404') {
        return 'Invalid Source';
    }

    $data = simplexml_load_string(file_get_contents($source));
    dd($data);
    if (count($data) == 0) {
        return 'No Posts';
    }
    $posts = '';
    foreach ($data->channel->item as $item) {
        $posts .= '<h1><a href="'.$item->link.'">'.$item->title.'</a></h1>';
        $posts .= '<h4>'.$item->pubDate.'</h4>';
        $posts .= '<p>'.$item->description.'</p>';
        $posts .= '<hr><hr>';
    }

    return $posts;
});
