<?php

use App\Models\Post;
use App\Models\Channel;
use App\Models\Category;

beforeEach(function () {
    $this->category = Category::factory()->create();
    $this->channel = Channel::factory()->create();
});

test('a guest gets redirected when using an old url', function () {
    $this->signIn();
    $post = Post::factory()->create(['title'=>'Peter Pike']);

     $this->followingRedirects()->get('/$post->slug')
                                ->assertSee('Peter Pike')
                                ->assertSee('Back');
});