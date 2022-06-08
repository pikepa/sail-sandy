<?php

use App\Models\Post;

test('an authorised user sees the Manage Posts page', function () {
    $this->signIn();

    $this->get('/posts')->assertSee('Manage Posts');
});

test('A guest can view a published post', function () {
    $post = Post::factory()->create();

    $this->get('/posts/{{$post->slug}}')
        ->assertSee($post->title)
        ->assertSee($post->body)
        ->assertSee('Home')
        ->assertSee('Bomborra');
});



