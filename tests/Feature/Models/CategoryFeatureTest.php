<?php

use App\Models\Category;
use function Pest\Laravel\{get, post, delete};

test('a guest cannot access the category index')
            ->get('/categories')  
            ->assertRedirect('/login');


test('an authorised user can access the category index', function () {

    Category::create(['category'=>'Featured', 'status'=>1]);
    
    $this->signIn();
    
    get(route('categories.index'))->assertStatus(200)->assertViewIs('categories.index');

    expect(Category::latest()->first()->category)->toBe('Featured');

});

test('an authorised user can store a the category', function () {
 
  $this->signIn();
     $this->withoutExceptionHandling();

    $cat= ['category'=>'Featured', 'status'=>1];
    
    post('/categories',$cat)->assertViewIs('categories.index');

    expect(Category::latest()->first()->category)->toBe('Featured');

});

test('a guest can not store a the category', function () {
      
    $cat= ['category'=>'Featured', 'status'=>1];
    
    post('/categories',$cat) ->assertRedirect('/login');

});

test('a guest can not edit a the category', function () {
      
    $cat= ['category'=>'Featured', 'status'=>1];
    
    get('/categories',$cat) ->assertRedirect('/login');

});


test('an authorised user can delete a the category', function () {

  $this->signIn();

  $cat = Category::create(['category'=>'Featured', 'status'=>1]);

  delete(route('categories.destroy', $cat ))->assertViewIs('categories.index');

});

test('a guest can not delete a the category', function () {

    $cat = Category::create(['category'=>'Featured', 'status'=>1]);
    
    delete(route('categories.destroy', $cat ))->assertRedirect('/login');

});

// test('an authorised user can create a Category', function (){ 

//   $this->signIn();

//   get('/categories/create')->assertSeeLivewire(CreateCategory::class);


// });