<?php

namespace App\Actions\Subscriber;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;

class RegisterSubscriber
{
    public function execute(array $data)
    {
        $validator = Validator::make($data, [
            'email' => 'email|required|unique:subscribers',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $subscriber = Subscriber::create([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $subscriber->sendOTP();

        return redirect()->back();
    }
}