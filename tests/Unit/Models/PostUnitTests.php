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

test('A post title has a max of 250 chars', function () {

    Livewire::test(ManagePosts::class)
    ->set('title',str_repeat('s',251))
    ->call('save')
    ->assertHasErrors(['title' => 'Max']);
  
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

test('A post body must have min 20 chars', function () {

    Livewire::test(ManagePosts::class)
    ->set('body',str_repeat('s',19))
    ->call('save')
    ->assertHasErrors(['body' => 'Min']);
  
  });

test('A post cover_img is required', function () {

    Livewire::test(ManagePosts::class)
    ->set('cover_img','')
    ->call('save')
    ->assertHasErrors(['cover_img' => 'required']);
  
  });

test('A post author_id is required', function () {

    Livewire::test(ManagePosts::class)
    ->set('author_id','')
    ->call('save')
    ->assertHasErrors(['author_id' => 'required']);
  
  });

test('A post category_id is required', function () {

    Livewire::test(ManagePosts::class)
    ->set('category_id','')
    ->call('save')
    ->assertHasErrors(['category_id' => 'required']);
  
  });


test('A post meta_description is required', function () {

    Livewire::test(ManagePosts::class)
    ->set('meta_description','qqweqe')
    ->call('save')
    ->assertHasErrors(['meta_description' => 'max']);
  
  });