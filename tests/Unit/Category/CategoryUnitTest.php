<?php

use App\Http\Livewire\Category\ManageCategories;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->signIn($this->user);
});

test('A category name is required', function () {
    Livewire::test(ManageCategories::class)
    ->set('name', '')
    ->call('save')
    ->assertHasErrors(['name' => 'required']);
});

test('A category name has max chars 50', function () {
    Livewire::test(ManageCategories::class)
    ->set('name', str_repeat('s', 51))
    ->call('save')
    ->assertHasErrors(['name' => 'max']);
});
test('A category description is required', function () {
    Livewire::test(ManageCategories::class)
    ->set('description', '')
    ->call('save')
    ->assertHasErrors(['description' => 'required']);
});

test('A category description has min chars 10', function () {
    Livewire::test(ManageCategories::class)
    ->set('description', str_repeat('s', 1))
    ->call('save')
    ->assertHasErrors(['description' => 'min']);
});

test('A category description has max chars 144', function () {
    Livewire::test(ManageCategories::class)
    ->set('description', str_repeat('s', 145))
    ->call('save')
    ->assertHasErrors(['description' => 'max']);
});

test('A status is required', function () {
    Livewire::test(ManageCategories::class)
    ->set('status', '')
    ->call('save')
    ->assertHasErrors(['status' => 'required']);
});

test('A status is a boolean', function () {
    Livewire::test(ManageCategories::class)
    ->set('status', '32.2')
    ->call('save')
    ->assertHasErrors(['status' => 'boolean']);
});

test('A category type is required', function () {
    Livewire::test(ManageCategories::class)
    ->set('type', '')
    ->call('save')
    ->assertHasErrors(['type' => 'required']);
});

test('When a user hits the add button the create form is shown', function () {
    Livewire::test(ManageCategories::class)
    ->call('showAddForm')
    ->assertSee('Add Category')
    ->assertSee('Save');
});

test('When a user hits the edit button the update form is shown', function () {
    Livewire::test(ManageCategories::class)
    ->call('showEditForm')
    ->assertSee('Edit Category')
    ->assertSee('Save');
});

test('When a user hits the show table button the main table is shown', function () {
    Livewire::test(ManageCategories::class)
    ->call('showTable')
    ->assertSee('Categories')
    ->assertDontSee('Edit Category')
    ->assertSee('Add Category');
});
