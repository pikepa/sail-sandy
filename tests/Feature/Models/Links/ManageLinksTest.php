<?php

use App\Models\Link;
use Livewire\Livewire;

    it('has a links listing page', function () {
        $this->signin();
        $this->get('/links')->assertStatus(200);
    });

    test('a guest gets redirected when trying to access links listing page', function () {
        $this->get('/links')->assertRedirect('/login', 403);
    });

    test('a User can see link details', function () {
        $link=Link::factory()->create();


        Livewire::test('ManageLinks')->assertSee($link->title);
    })->skip();
