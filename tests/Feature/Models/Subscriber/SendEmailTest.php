<?php

use App\Mail\SubsConfMail;
use App\Models\Subscriber;
use function Pest\Faker\faker;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use Illuminate\Support\Facades\Mail;

test('an email is sent when a subscriber is created', function () {
     
    Mail::fake();
        
    $email = faker()->email;

    post('/subscribers', ['email' => $email, 'name' => 'Peter Piper']);

    Mail::AssertSent(SubsConfMail::class);
});

test('an email is not sent if subscriber is not created', function () {

    Mail::fake();
        
    $email = faker()->email;

    post('/subscribers', ['email' => 'asdaddaddasdadsa']);

    Mail::AssertNotSent(SubsConfMail::class);
});


test('an OTP is stored in Cache for the subscriber', function () {

    Mail::fake();
        
    $email = faker()->email;

    post('/subscribers', ['email' => $email, 'name' => 'Peter Piper']);

    $subscriber = Subscriber::get()->first();
    
    $this->assertNotNull($subscriber->OTP());

});

