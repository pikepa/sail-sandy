<?php

use App\Http\Livewire\Posts\ManagePosts;
use App\Models\Category;
use App\Models\Channel;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->signIn($this->user);
});

test('Post Validation rules on save', function ($field, $value, $rule) {
    Livewire::test(ManagePosts::class)
    ->set($field, $value)
    ->call('save')
    ->assertHasErrors([$field => $rule]);
})->with('post_validation');

test('when the post title is changed the slug changes', function () {
    Category::factory()->create();
    Channel::factory()->create();

    $post = Post::factory()->create([
        'title' => 'this-is-a-fake-title', ]);

    Livewire::test(ManagePosts::class)
    ->call('edit', $post->id)
    ->set('title', 'this is a new title')
    ->call('update', $post->id);

    $this->assertDatabaseHas('posts', ['slug' => 'this-is-a-new-title']);
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
