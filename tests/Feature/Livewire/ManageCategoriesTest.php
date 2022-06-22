<?php

use App\Http\Livewire\Category\ManageCategories;
use App\Models\Category;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('a guest cannot access the category index')
            ->get('/categories')
            ->assertDontSeeLivewire('category.manage-categories')
            ->assertRedirect('/login');

test('an authorised user can see the manage-categories page', function () {
    $this->actingAs($this->user)->get('/categories')
         ->assertSuccessful()
         ->assertSeeLivewire('category.manage-categories');
});

test('an authorised user can create a category', function () {
    $this->signIn($this->user);

    Livewire::test(ManageCategories::class)
    ->set('name', 'FOOBAR')
    ->set('slug', 'foobar')
    ->set('status', 1)
    ->call('save')
    ->assertSuccessful();

    expect(Category::latest()->first()->name)->toBe('FOOBAR');
});

test('an authorised user can update a category', function () {
    $this->signIn($this->user);
    $category = Category::factory()->create();

    Livewire::test(ManageCategories::class)
    ->set('category_id', '1')
    ->set('name', 'FOOBAR')
    ->set('status', 1)
    ->call('update')
    ->assertSuccessful();

    expect(Category::latest()->first()->name)->toBe('FOOBAR');
});

test('an authorised user can delete a category', function () {
    $this->signIn($this->user);
    $category = Category::factory()->create();

    Livewire::test(ManageCategories::class)
    ->set('category_id', $category->id)

    ->call('destroy')
    ->assertSuccessful();

    $this->assertDatabaseCount('categories', 0);
});

test('an authorised user can see a category listing', function () {
    $this->signIn($this->user);
    $category = Category::factory()->create();

    Livewire::test(ManageCategories::class)
    ->assertSee($category->category);

    $this->assertDatabaseCount('categories', 1);
});
