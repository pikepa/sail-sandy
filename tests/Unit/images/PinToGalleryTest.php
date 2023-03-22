<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Channel;
use App\Models\Category;



test('an authorised user can pin an image to the post gallery', function () {
    User::factory()->create();
    Channel::factory()->create();
    $category = Category::factory()->create(['slug' => 'welcome']);
    $post = Post::factory()->create([
        'category_id' => $category->id,
    ]);

})->toDo();