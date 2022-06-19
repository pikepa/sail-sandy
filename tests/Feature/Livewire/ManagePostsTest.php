<?php

use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Livewire\Posts\ShowPost;
use App\Http\Livewire\Posts\ManagePosts;

test('An authorised user sees the Manage Posts page', function () {
    $this->signIn();
    Livewire::test(ManagePosts::class)->assertSee('Posts')
    ->assertSee('A list of all the posts in your account.');

});

test('A guest can view a published post', function () {
    Category::factory()->create();
    User::factory()->create();

    $post = Post::factory()->create();

   Livewire::test(ShowPost::class,['slug' => $post->slug])
       ->assertStatus(200)
        ->assertSee($post->category->name)
        ->assertSee('Bomborra')
        ->assertSee($post->title)
        ->assertSee($post->body);
});

test('An authorised user can see a list of all posts', function () {
    
    $this->signIn();
    $category = Category::factory()->create();

    $post1 = Post::factory()->create(['category_id'=>1]);
    $post2 = Post::factory()->create(['category_id'=>1]);

    $this->get('/posts/')
        ->assertSee($post1->title)
        ->assertSee($post1->author_id)
        ->assertSee($category->name)
        ->assertSee('Home')
        ->assertSee('Bomborra')
        ->assertSee($post2->title)
        ->assertSee($post2->author_id);
});

test('An authorised user can add a post', function () {
    $this->actingAs(User::factory()->create());
   
    $category = Category::factory()->create();

    Livewire::test(ManagePosts::class)
        ->set('uuid', (string) Str::uuid())
        ->set('cover_image', 'https://google.com')
        ->set('title', 'this is a post')
        ->set('slug', 'this-is-a-post')
        ->set('body', str_repeat('s',100))
        ->set('category_id',$category->id)
        ->set('author_id', auth()->user()->id)
        ->set('published_at', '')
        ->set('meta_description', 'This is the meta description')
        ->call('save') 
        ->assertSuccessful();

    $this->assertDatabaseCount('posts',1)
    ->assertDatabaseHas('posts',['title' =>'this is a post'] );

});


test('An authorised user can delete a post', function () {
    $this->actingAs(User::factory()->create());
    Category::factory()->create();

    $post = Post::factory()->create();

    $this->assertDatabaseCount('posts',1);

    Livewire::test(ManagePosts::class)
        ->call('delete',$post->id) 
        ->assertSuccessful();

    $this->assertDatabaseCount('posts',0);

});


test('A message is displayed when a user deletes a post', function () {
    $this->actingAs(User::factory()->create());
    Category::factory()->create();

    $post = Post::factory()->create();


    Livewire::test(ManagePosts::class)
        ->assertDontSee('Post Successfully deleted')
        ->call('delete',$post->id) 
        ->assertSee('Post Successfully deleted');

});





