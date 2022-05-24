<?php

use App\Models\Post;
use App\Models\Subscriber;
use function Pest\Laravel\get;


it('can load the home page', function()
    {
        get('/')
        ->assertStatus(200)
        ->assertSee('Bomborra Media Productions')
        ->assertSee('Featured Articles')
        ->assertSee('Podcasts');
    });


    