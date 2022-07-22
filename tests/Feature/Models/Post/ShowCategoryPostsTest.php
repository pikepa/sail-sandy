<?php

use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Category;
use App\Http\Livewire\Posts\ShowCategoryPosts;

test('any user can view published posts by category', function () {
    $this->withoutExceptionHandling();

    $user=User::factory()->create();
    $category=Category::factory()->create();
    $post=Post::factory()->create(['published_at'=>now()]);

    Livewire::test(ShowCategoryPosts::class, ['cat_slug'=>$category->slug])
    ->assertStatus(200)
    ->assertSee($post->title)
    ->assertSee('Published on')
    ->assertSee($post->published_at->toFormattedDateString())
    ->assertSee('by')
    ->assertSee($post->author->name)
    ->assertSee($post->body);
    
});
