<?php

use App\Models\Subscriber;
use Illuminate\Support\Str;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use Illuminate\Support\Facades\Cache;

test('a subscriber can submit an OTP and be verified', function () {

    $subscriber = Subscriber::factory()->create();

    $OTP= $subscriber->cacheTheOTP();

    post('/verifyOTP/$subscriber->id/$subscriber->OTPKey()')
    ->assertSee('Thank you, your subscription has been verified.');

    post('/verifyOTP/$subscriber->id/$subscriber->OTPKey()')
    ->assertSee('Sorry validation can not be repeated or the validation code is incorrect.');
    
    $subscriber = Subscriber::get()->first();

    $this->assertNotNull($subscriber->validated_at);
});

test('a successful validation is shown to the user.', function () {

    $subscriber = Subscriber::factory()->create();

    $OTP= $subscriber->cacheTheOTP();

    post('/verifyOTP/$subscriber->id/$subscriber->OTPKey()')
    ->assertSee('Thank you, your subscription has been verified.');
});

test('an unsuccessful or duplicate validation is shown to the user.', function () {

    $subscriber = Subscriber::factory()->create();

    $OTP= $subscriber->cacheTheOTP();

    post('/verifyOTP/$subscriber->id/$subscriber->OTPKey()')
    ->assertSee('Thank you, your subscription has been verified.');
    
    post('/verifyOTP/$subscriber->id/$subscriber->OTPKey()')
    ->assertSee('Sorry validation can not be repeated or the validation code is incorrect.');
});
