<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VerifySubscriberController extends Controller
{
    public function verify(Request $request){

        $subscriber = Subscriber::find($request->id);
        
        if($request->OTP === Cache::get('OTP')){
            $subscriber->update(['validated_at' => now()]);
            return response(null,201);
        }
    }
}
