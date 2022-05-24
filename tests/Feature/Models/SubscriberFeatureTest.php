<?php

use App\Models\Subscriber;
use function Pest\Laravel\get;
use function Pest\Laravel\put;
use function Pest\Laravel\post;

use Tests\RequestFactories\SignupRequestFactory;


test('anyone can subscribe to the Newsletter', function () {
        
        post('/subscribers', ['email' => 'pikepeter@gmail.com'])->assertValid();

        expect(Subscriber::latest()->first()->email)->toBe('pikepeter@gmail.com');

}); 

test('an new email must be unique on the subscribers table', function () {

        Subscriber::create(['email' => 'pikepeter@gmail.com']);
        
        post('/subscribers', ['email' => 'pikepeter@gmail.com'])

        ->assertInvalid(['email' => 'The email has already been taken.']);

});

test('an new email must be a valid email', function () {
        
        post('/subscribers', ['email' => 'pikepeter.gmail.com'])

        ->assertInvalid(['email' => 'The email must be a valid email address.']);

});

test('an email is required for a subscribers table', function () {
        
        post('/subscribers', ['email' => ''])

        ->assertInvalid(['email' => 'The email field is required.']);

});




