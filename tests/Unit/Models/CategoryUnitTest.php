<?php

use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\Category\ManageCategories;


beforeEach(function () {
  $this->user = User::factory()->create();
}); 


test('A category is required', function () {
  $this->signIn($this->user);

  Livewire::test(ManageCategories::class)
  ->set('category','')
  ->set('status', 1)
  ->call('save')
  ->assertHasErrors(['category' => 'required']);

});

test('A category has max chars 50', function () {
  $this->signIn($this->user);

  Livewire::test(ManageCategories::class)
  ->set('category',str_repeat('s',51))
  ->set('status', 1)
  ->call('save')
  ->assertHasErrors(['category' => 'max']);

});

test('A status is required', function () {
  $this->signIn($this->user);

  Livewire::test(ManageCategories::class)
  ->set('category','Foo bar')
  ->set('status', '')
  ->call('save')
  ->assertHasErrors(['status' => 'required']);

});

test('A status is an integer', function () {
  $this->signIn($this->user);

  Livewire::test(ManageCategories::class)
  ->set('category','Foo bar')
  ->set('status', '32.2')
  ->call('save')
  ->assertHasErrors(['status' => 'integer']);

});