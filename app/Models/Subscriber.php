<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Mail\SubscribedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasFactory;

    protected $table = 'subscribers';

    public $casts = [
        'validated_at' => 'datetime:format("yyyy-mm-dd")',
    ];

    protected $fillable = ['name', 'email', 'validation_key', 'validated_at'];

    public function OTP()
    {
        return Cache::get($this->OTPKey());
    }

    public function OTPKey()
    {
        return "OTP_for_{$this->id}";
    }

    public function cacheTheOTP()
    {
        $OTP = Str::random(32);

        $this->update(['validation_key' => $OTP]);

        Cache::put([$this->OTPKey() => $OTP], now()->addMinutes(30));

        return $OTP;
    }

    public function sendOTP()
    {
        $this->cacheTheOTP();

        Mail::to($this->email)
  //  ->send(new SubscribedEmail($this->cacheTheOTP(),$this->id))
    ->queue(new SubscribedEmail($this->cacheTheOTP(), $this->id));
    }
}