<?php

use App\Http\Livewire\Posts\ManagePosts;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->signIn($this->user);
});

test('A post title is required', function () {
    Livewire::test(ManagePosts::class)
    ->set('title', '')
    ->call('save')
    ->assertHasErrors(['title' => 'required']);
});

test('A post title has a max of 250 chars', function () {
    Livewire::test(ManagePosts::class)
    ->set('title', str_repeat('s', 251))
    ->call('save')
    ->assertHasErrors(['title' => 'Max']);
});

test('A post body is required', function () {
    Livewire::test(ManagePosts::class)
    ->set('body', '')
    ->call('save')
    ->assertHasErrors(['body' => 'required']);
});

test('A post body must have min 20 chars', function () {
    Livewire::test(ManagePosts::class)
    ->set('body', str_repeat('s', 19))
    ->call('save')
    ->assertHasErrors(['body' => 'Min']);
});

test('A post cover_image is an url', function () {
    Livewire::test(ManagePosts::class)
    ->set('cover_image', 'aviator')
    ->call('save')
    ->assertHasErrors(['cover_image' => 'url']);
});

test('A post author_id is required', function () {
    Livewire::test(ManagePosts::class)
    ->set('author_id', '')
    ->call('save')
    ->assertHasErrors(['author_id' => 'required']);
});

test('A post category_id is required', function () {
    Livewire::test(ManagePosts::class)
    ->set('category_id', '')
    ->call('save')
    ->assertHasErrors(['category_id' => 'required']);
});

test('A post meta_description is required', function () {
    Livewire::test(ManagePosts::class)
    ->set('meta_description', '')
    ->call('save')
    ->assertHasErrors(['meta_description' => 'required']);
});

test('A post meta_description has a max of 300 chars', function () {
    Livewire::test(ManagePosts::class)
    ->set('meta_description', str_repeat('s', 301))
    ->call('save')
    ->assertHasErrors(['meta_description' => 'max']);
});

test('when the post title is changed the slug changes', function () {
    Category::factory()->create();
    $post = Post::factory()->create(['slug' => 'this-is-a-fake-title']);

    Livewire::test(ManagePosts::class)
    ->call('edit', $post->id)
    ->set('title', 'this is a new title')
    ->call('update', $post->id);

    $this->assertDatabaseHas('posts', ['slug' => 'this-is-a-new-title']);
});

test('A post is_in_vault flag is required', function () {
    Livewire::test(ManagePosts::class)
    ->set('is_in_vault', '')
    ->call('save')
    ->assertHasErrors(['is_in_vault' => 'Required']);
});

test('When a user hits the add button the create form is shown', function () {
    Livewire::test(ManagePosts::class)
      ->call('showAddForm')
      ->assertSee('Add Post')
      ->assertSee('Save');
});

  test('When a user hits the edit button the update form is shown', function () {
      Livewire::test(ManagePosts::class)
      ->call('showEditForm')
      ->assertSee('Edit Post')
      ->assertSee('Save');
  });

  test('When a user hits the show table button the main table is shown', function () {
      Livewire::test(ManagePosts::class)
      ->call('showTable')
      ->assertSee('Posts')
      ->assertDontSee('Edit Post')
      ->assertSee('Add Post');
  });
