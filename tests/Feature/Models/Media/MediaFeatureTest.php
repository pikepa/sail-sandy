<?php

it('has models/media/mediafeature page', function () {
    $response = $this->get('/models/media/mediafeature');

    $response->assertStatus(200);
});
