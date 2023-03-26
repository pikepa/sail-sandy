<?php

use Livewire\Livewire;
use App\Http\Livewire\Links\ManageLinks;

test('Link Validation rules on save', function ($field, $value, $rule) {
    $this->signIn();
    
    Livewire::test(ManageLinks::class)
    ->set($field, $value)
    ->call('save')
    ->assertHasErrors([$field => $rule]);
})->with('link_validation');
