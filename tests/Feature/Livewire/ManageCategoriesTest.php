<?php

use App\Http\Livewire\Category\ManageCategories;
use App\Models\Category;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('a guest cannot access the category index', function () {
    $this->get('/dashboard')
        ->assertRedirect('/login');
});

test('an authorised user can create a category', function () {
    $this->signIn($this->user);

    Livewire::test(ManageCategories::class)
        ->call('create')
        ->assertSee('Add Category')
        ->assertSee('Category')
        ->set('name', 'FOOBAR')
        ->set('description', 'This is the main description')
        ->set('type', 'main')
        ->set('parent_id', '')
        ->set('status', true)
        ->call('save')
        ->assertSuccessful()
        ->assertSee('Category Successfully added.');

    $this->assertDatabaseCount('categories', 1);

    expect(Category::latest()->first()->slug)->toBe('foobar');
});

test('an authorised user can update a category', function () {
    $this->signIn($this->user);
    $category = Category::factory()->create();

    Livewire::test(ManageCategories::class)
        ->call('edit', $category->id)
        ->set('name', 'FOOBAR')
        ->set('description', 'Any new description')
        ->set('status', 1)
        ->call('update', $category->id)
        ->assertSuccessful()
        ->assertSee('Category Successfully updated.');

    expect(Category::latest()->first()->name)->toBe('FOOBAR');
});

test('an authorised user can delete a category', function () {
    $this->signIn($this->user);
    $category = Category::factory()->create();

    Livewire::test(ManageCategories::class)
        ->call('delete', $category->id)
        ->assertSuccessful()
        ->assertSee('Category Successfully deleted.');

    $this->assertDatabaseCount('categories', 0);
});

test('an authorised user can see a category listing', function () {
    $this->signIn($this->user);
    $category = Category::factory()->create(['status' => true]);

    Livewire::test(ManageCategories::class)
        ->assertSee($category->name)
        ->assertSee('Active');

    $this->assertDatabaseCount('categories', 1);
});
