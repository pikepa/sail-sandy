<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use function Pest\Laravel\get;

it('can load the home page', function () {
    get('/')
        ->assertStatus(200)
        ->assertSee('Bomborra Media Productions')
        ->assertSee('Latest Articles')
        ->assertSee('Podcasts');
});

test('A guest can view a posts on the home page', function () {
    Category::factory()->create();
    User::factory()->create();
    $post = Post::factory()->create();

    $this->get('/')
    ->assertStatus(200)
    ->assertSee($post->title)
    ->assertSee('... more')
    ->assertSee(substr($post->description. 0, 50));
});
