<?php

use App\Models\Subscriber;

use function Pest\Laravel\post;
use function Pest\Faker\faker;

test('anyone can subscribe to the Newsletter', function () {
        $email = faker()->email;

        post('/subscribers', ['email' => $email, ])->assertValid();

        expect(Subscriber::latest()->first()->email)->toBe($email);

}); 

test('an new email must be unique on the subscribers table', function () {

        $email = faker()->email;
       
        Subscriber::create(['email' => $email]);
        
        post('/subscribers', ['email' => $email])

        ->assertInvalid(['email' => 'The email has already been taken.']);

});

test('an new email must be a valid email', function () {
        $email = faker()->name;

        post('/subscribers', ['email' => $email])

        ->assertInvalid(['email' => 'The email must be a valid email address.']);

});

test('an email is required for a subscribers table', function () {
        
        post('/subscribers', ['email' => ''])

        ->assertInvalid(['email' => 'The email field is required.']);

});






