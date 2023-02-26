<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use function Pest\Laravel\get;

it('can load the welcome page', function () {

    $user=User::factory()->create();
    $category=Category::factory()->create(['slug'=>'welcome']);
    $post=Post::factory()->create([
        'category_id'=>$category->id,
        'author_id'=>$user->id
    ]);

    get('/')
        ->assertStatus(200)
        ->assertSee($post->title)
        ->assertSee('Enter');
});

