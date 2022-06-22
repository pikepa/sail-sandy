<?php

use App\Models\Subscriber;
use function Pest\Faker\faker;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('anyone can subscribe to the Newsletter', function () {
    $email = faker()->email;

    post('/subscribers', ['email' => $email, 'name'=> 'Peter Piper'])->assertValid();

    expect(Subscriber::latest()->first()->email)->toBe($email);
});

test('an new email must be unique on the subscribers table', function () {
    $email = faker()->email;

    Subscriber::create(['email'=>$email]);

    post('/subscribers', ['email' => $email])

        ->assertInvalid(['email' => 'The email has already been taken.']);
});

test('an new email must be a valid email', function () {
    $email = faker()->name;

    post('/subscribers', ['email' => $email])

        ->assertInvalid(['email' => 'The email must be a valid email address.']);
});

test('an email is required for a subscriber', function () {
    post('/subscribers', ['email' => ''])

        ->assertInvalid(['email' => 'The email field is required.']);
});

test('a name is required for a subscriber', function () {
    post('/subscribers', ['name' => ''])

        ->assertInvalid(['name' => 'The name field is required.']);
});

test('a newsletter subscribe button appears on the home screen', function () {
    $res = get('/')->assertSuccessful()
       ->assertSee('Newsletter');
});

test('a guest user can see the create subscriber page', function () {
    $this->get('/subscribers/create')
         ->assertSuccessful()
         ->assertSee('Newsletter Registration')
         ->assertSee('Name')
         ->assertSee('Email');
});
