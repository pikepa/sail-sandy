<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Channel;
use App\Models\Category;

it('a post belongs to a channel', function () {
    User::factory()->create();
    Category::factory()->create();
    Channel::factory()->create();


    $post = Post::factory()
     ->has(Channel::factory())
     ->create();

    expect($post->channel)
        ->toBeInstanceOf(Channel::class);
});
