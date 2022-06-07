<?php

it('has post/manageposts page', function () {
    $response = $this->get('/post/manageposts');

    $response->assertStatus(200);
});
