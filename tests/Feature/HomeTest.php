<?php

use App\Models\Post;

{
    it('can load the home page', function()
    {
        $this->get('/')
        ->assertStatus(200)
        ->assertSee('Bomborra Media Productions')
        ->assertSee('Featured Articles')
        ->assertSee('Podcasts');
    });


}
