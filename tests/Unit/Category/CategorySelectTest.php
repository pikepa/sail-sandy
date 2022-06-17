<?php

use Livewire\Livewire;
use App\Http\Livewire\Forms\CategorySelect;

test('the select component emits an event on selection', function () {
    Livewire::test(CategorySelect::class)
        ->set('category_id', 1)
        ->assertEmitted('category_selected');
        
});
