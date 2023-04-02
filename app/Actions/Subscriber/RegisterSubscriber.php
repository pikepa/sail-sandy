<?php

namespace App\Actions\Subscriber;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;

class RegisterSubscriber
{
    public function __invoke(array $data): Subscriber
    {
        $data = Validator::validate($data, [
            'email' => 'email|required|unique:subscribers',
            'name' => 'required|string|max:255',
        ]);

        $subscriber = Subscriber::create([
            ...$data,
        ]);

        $subscriber->sendOTP();

        return $subscriber;
    }
}