<?php

use App\Models\User;


use Livewire\Livewire;
use App\Http\Livewire\Posts\ManagePosts;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->signIn($this->user);
  }); 

test('A post title is required', function () {

    Livewire::test(ManagePosts::class)
    ->set('title','')
    ->call('save')
    ->assertHasErrors(['title' => 'required']);
  
  });

test('A post slug is required', function () {

    Livewire::test(ManagePosts::class)
    ->set('slug','')
    ->call('save')
    ->assertHasErrors(['slug' => 'required']);
  
  });

test('A post body is required', function () {

    Livewire::test(ManagePosts::class)
    ->set('body','')
    ->call('save')
    ->assertHasErrors(['body' => 'required']);
  
  });

test('A post cover_img is required', function () {

    Livewire::test(ManagePosts::class)
    ->set('cover_img','')
    ->call('save')
    ->assertHasErrors(['cover_img' => 'required']);
  
  });

test('A post meta_description is required', function () {

    Livewire::test(ManagePosts::class)
    ->set('meta_description','')
    ->call('save')
    ->assertHasErrors(['meta_description' => 'required']);
  
  });