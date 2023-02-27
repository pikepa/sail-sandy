<?php

use App\Http\Livewire\Posts\ManagePosts;
use App\Http\Livewire\Posts\ShowPost;
use App\Models\Category;
use App\Models\Channel;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
     $this->category = Category::factory()->create();
     $this->channel = Channel::factory()->create();
});

test('An authorised user sees the Manage Posts page', function () {
    $this->signIn();
    Livewire::test(ManagePosts::class)->assertSee('Posts')
    ->assertSee('A list of all the posts in your account.');
});

test('A guest can view a published post', function () {

    User::factory()->create();

    $post = Post::factory()->create();

    Livewire::test(ShowPost::class, ['slug' => $post->slug])
       ->assertStatus(200)
        ->assertSee($post->category->name)
        ->assertSee('Bomborra')
        ->assertSee($post->title)
        ->assertSee($post->body);
});

test('An authorised user can see a list of all posts', function () {
    $this->signIn();

    $post1 = Post::factory()->create();
    $post2 = Post::factory()->create();

    Livewire::test(ManagePosts::class)
        ->set('showTable', true)
        ->call('render')
        ->assertSee($post1->title)
        ->assertSee($post1->author_id)
        ->assertSee($post2->title)
        ->assertSee($post2->author_id);
});

test('An authorised user can add a post', function () {

    $this->actingAs(User::factory()->create());

    Livewire::test(ManagePosts::class)
        ->call('create')
        ->assertSee('Title')
        ->set('cover_image', '')
        ->set('title', 'this is a post')
        ->set('slug', 'this-is-a-post')
        ->set('body', str_repeat('s', 100))
        ->set('is_in_vault', false)
        ->set('category_id', $this->category->id)
        ->set('channel_id', $this->channel->id)
        ->set('author_id', auth()->user()->id)
        ->set('published_at', '')
        ->set('meta_description', 'This is the meta description')
        ->call('save')
        ->assertSuccessful()
        ->assertSee('Edit Post') ;  //user is returned to edit page to add photo's


    $this->assertDatabaseCount('posts', 1)
    ->assertDatabaseHas('posts', ['title' => 'this is a post',
        'is_in_vault' => false, ]);
});

test('an authorised user can update a post', function () {

    $this->actingAs(User::factory()->create());

    $post = Post::factory()->create();

    Livewire::test(ManagePosts::class)
    ->call('edit', $post->id)
    ->set('title', 'This title needs to be over ten characters')
    ->call('update', $post->id)
    ->assertSuccessful()
    ->assertSee('Post Successfully Updated.');

    expect(Post::find($post->id)->title)->toBe('This title needs to be over ten characters');
});

test('An authorised user can delete a post', function () {
    $this->actingAs(User::factory()->create());

    $post = Post::factory()->create();

    $this->assertDatabaseCount('posts', 1);

    Livewire::test(ManagePosts::class)
        ->call('delete', $post->id)
        ->assertSuccessful();

    $this->assertDatabaseCount('posts', 0);
});

test('A message is displayed when a user deletes a post', function () {
    $this->signIn();

    $post = Post::factory()->create();

    Livewire::test(ManagePosts::class)
        ->assertDontSee('Post Successfully deleted')
        ->call('delete', $post->id)
        ->assertSee('Post Successfully deleted');
});

test('An authorised User can mark a post as being in the vault', function () {
    $this->signIn();
    $post = Post::factory()->create(['is_in_vault' => false]);

    Livewire::test(ManagePosts::class)
        ->call('edit', $post->id)
        ->assertDontSee('Post Successfully Updated')
        ->set('is_in_vault', true)
        ->set('meta_description', 'this is a new meta_description')
        ->call('update', $post->id)
        ->assertSee('Post Successfully Updated');

    $this->assertDatabaseHas('posts', ['is_in_vault' => true,
        'meta_description' => 'this is a new meta_description', ]);
});
