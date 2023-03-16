<?php

use App\Models\Link;
use Livewire\Livewire;
use App\Http\Livewire\Links\ManageLinks;

    it('has a links listing page', function () {
        $this->signin();
        $this->get('/links')->assertStatus(200);
    });

    test('a guest gets redirected when trying to access links listing page', function () {
        $this->get('/links')->assertRedirect('/login', 403);
    });

    test('a User can see a table of links', function () {
        $this->signin();

        $link1 = Link::factory()->create();
        $link2 = Link::factory()->create();
        
        Livewire::test(ManageLinks::class)
            ->assertSee($link1->title)->assertSee($link1->owner->name)
            ->assertSee($link2->title);
    });
