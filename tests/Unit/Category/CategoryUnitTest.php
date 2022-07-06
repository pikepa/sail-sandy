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
    ->set('status', 1)
    ->call('save')
    ->assertHasErrors(['name' => 'required']);
});

test('A category has max chars 50', function () {
    Livewire::test(ManageCategories::class)
    ->set('name', str_repeat('s', 51))
    ->set('status', 1)
    ->call('save')
    ->assertHasErrors(['name' => 'max']);
});

test('A status is required', function () {
    Livewire::test(ManageCategories::class)
    ->set('name', 'Foo bar')
    ->set('status', '')
    ->call('save')
    ->assertHasErrors(['status' => 'required']);
});

test('A status is a boolean', function () {
    Livewire::test(ManageCategories::class)
    ->set('name', 'Foo bar')
    ->set('status', '32.2')
    ->call('save')
    ->assertHasErrors(['status' => 'boolean']);
});

test('A category type is required', function () {
    Livewire::test(ManageCategories::class)
    ->set('name', 'Foo bar')
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
