<?php

use App\Models\Category;
use function Pest\Laravel\get;
use function Pest\Laravel\post;


test('Category is a mandatory field', function () {

    $this->signIn();
       
    $cat= ['category'=>'', 'status'=>1];
    
    post('/categories',$cat)->assertInvalid(['category' => 'The category field is required.']);
  
  });
  
  test('Category is a unique value field', function () {
  
    Category::create(['category'=>'Featured', 'status'=>'1']);
  
    $this->signIn();
       
    $cat= ['category'=>'Featured', 'status'=>'1'];
    
    post('/categories',$cat)->assertInvalid(['category' => 'The category has already been taken.']);
  
  });
  
  test('Status is either 0 or 1', function () {
  
    $this->signIn();
       
    $cat= ['category'=>'Featured', 'status'=>'2'];
    
    post('/categories',$cat)->assertInvalid(['status' => 'The status must be between 0 and 1.']);
  
  });