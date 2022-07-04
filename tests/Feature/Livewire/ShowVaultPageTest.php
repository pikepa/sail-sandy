<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('the vault displays posts marked as in the vault', function () {
    $category = Category::factory()->create();
    $post = Post::factory()->create(['author_id' => $this->user->id,
        'is_in_vault' => true, ]);

    $this->get('/vault/')->assertStatus(200)
        ->assertSee($post->title)
        ->assertSee('The Vault')
        ->assertSee('Back');
});
