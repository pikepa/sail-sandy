<?php

use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\Pages\DashStandardPage;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('an authorised user can access the dashboard page', function () {
    $this->actingAs($this->user);

    $response = $this->get('/dashboard');
    $response->assertStatus(200);
});

test('a guest can not access the dashboard page', function () {
    $response = $this->get('/dashboard');
    $response->AssertRedirect('/login');
});

test('an authorised user can see the manage-categories page', function () {
    $this->actingAs($this->user);
    
    Livewire::test(DashStandardPage::class)
        ->set('show','categories')
        ->assertSeeLivewire('category.manage-categories');
});

test('an authorised user can see the manage-posts page', function () {
    $this->actingAs($this->user);
    
    Livewire::test(DashStandardPage::class)
        ->set('show','posts')
        ->assertSeeLivewire('posts.manage-posts');
});

test('an authorised user can see the manage-pages page', function () {
    $this->actingAs($this->user);
    
    Livewire::test(DashStandardPage::class)
        ->set('show','pages')
        ->assertSeeLivewire('pages.manage-pages');
});

test('an authorised user can see the dashboaard page', function () {
    $this->actingAs($this->user);
    
    Livewire::test(DashStandardPage::class)
        ->set('show','dash')
        ->assertSee('Posts');
});

test('an authorised user can see the home link', function () {
    $this->actingAs($this->user);
    
    Livewire::test(DashStandardPage::class)
        ->assertSee('Dashboard')
        ->assertSee('Home')
        ->assertSee('/')
        ->assertSee('Hi '.$this->user->name )
        ->assertSee('Log Out')
        ;
});