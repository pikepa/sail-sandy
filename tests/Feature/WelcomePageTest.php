<?php

use function Pest\Laravel\get;

it('can load the welcome page', function () {
    get('/')
        ->assertRedirect('/home');
});
