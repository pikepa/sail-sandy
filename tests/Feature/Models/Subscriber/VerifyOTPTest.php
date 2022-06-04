<?php

use App\Models\Subscriber;
use Illuminate\Support\Str;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use Illuminate\Support\Facades\Cache;

it('a subscriber can submit an OTP and be verified', function () {

    $subscriber = Subscriber::factory()->create();

    $OTP= $subscriber->cacheTheOTP();

    post('/verifyOTP', [$subscriber->OTPKey() => $OTP, 'id' => $subscriber->id])->assertStatus(201);
    
    $subscriber = Subscriber::get()->first();

    $this->assertNotNull($subscriber->validated_at);


});
