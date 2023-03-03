<?php

use App\Models\Post;
use App\Models\Channel;
use App\Models\Category;

it('has many posts', function () {
    //Set up
    $this->signIn();
    Category::factory()->create();

    $channel = Channel::factory()
        ->has(Post::factory()->count(2))
        ->create();

    expect($channel->posts)
        ->toHaveCount(2)
        ->each->toBeInstanceOf(Post::class);
});
