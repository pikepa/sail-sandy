<?php

use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Category;
use App\Http\Livewire\Posts\ShowPost;
use App\Http\Livewire\Posts\ManagePosts;

test('An authorised user sees the Manage Posts page', function () {
    $this->signIn();
    Livewire::test(ManagePosts::class)->assertSee('Posts')
    ->assertSee('A list of all the posts in your account.');

});

test('A guest can view a published post', function () {
    Category::factory()->create();

    $post = Post::factory()->create(['category_id'=>1]);

   Livewire::test(ShowPost::class,['slug' => $post->slug])
       ->assertStatus(200)
        ->assertSee('Home')
        ->assertSee('Bomborra')
        ->assertSee($post->title)
        ->assertSee($post->body);
});

test('An authorised user can see a list of all posts', function () {
    
    $this->signIn();
    Category::factory()->create();

    $post1 = Post::factory()->create(['category_id'=>1]);
    $post2 = Post::factory()->create(['category_id'=>1]);

    $this->get('/posts/')
        ->assertSee($post1->title)
        ->assertSee($post1->author_id)
        ->assertSee($post1->published_at)
        ->assertSee('Home')
        ->assertSee('Bomborra')
        ->assertSee($post2->title)
        ->assertSee($post2->author_id)
        ->assertSee($post2->published_at);
});

test('An authorised user can add a post', function () {
   
    $this->actingAs(User::factory()->create());
   
    Category::factory()->create();

    Livewire::test(ManagePosts::class)
        ->set('cover_img', 'https://google.com')
        ->set('title', 'this is a post')
        ->set('slug', 'this-is-a-post')
        ->set('body', str_repeat('s',100))
        ->set('category_id',1)
        ->set('author_id',$this->auth()->user)
        ->set('published_at', '')
        ->set('featured', true)
        ->set('meta_description', 'This is the meta description')
        ->call('save') 
        ->assertSuccessful();

    $this->assertDatabaseCount('posts',1);

});





