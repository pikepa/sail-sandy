<?php

use App\Models\Post;


it('can return all posts', function()
{
    $post =Post::factory()->create(['title' => 'my title']);

    $posts = $this->get(route('posts.index'))   ->assertStatus(200)
                                                ->assertSee('All Posts')
                                                ->assertSee('my title');


});