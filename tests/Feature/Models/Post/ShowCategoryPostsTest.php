<?php

use App\Http\Livewire\Posts\ShowCategoryPosts;
use App\Models\Category;
use App\Models\Channel;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

test('any user can view published posts by category', function () {
    $this->withoutExceptionHandling();

    $user = User::factory()->create();
    $category = Category::factory()->create();
    Channel::factory()->create();

    $post = Post::factory()->create(['published_at' => now()]);

    Livewire::test(ShowCategoryPosts::class, ['cat_slug' => $category->slug])
        ->assertStatus(200)
        ->assertSee($post->title)
        ->assertSee('Published on')
        ->assertSee($post->published_at->toFormattedDateString())
        ->assertSee('by')
        ->assertSee($post->author->name)
        ->assertSee($post->body);
});

test('displays "No Posts within this Category" if colllection is empty', function () {
    //Set up
    $user = User::factory()->create();
    $category = Category::factory()->create();
    Channel::factory()->create();

    // $post=Post::factory()->create(['published_at'=>now()]);

    //act and Assert
    Livewire::test(ShowCategoryPosts::class, ['cat_slug' => $category->slug])
        ->assertStatus(200)
        ->assertSee('Sorry, there are currently no Articles within this Category');
});
