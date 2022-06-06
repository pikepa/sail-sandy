<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $OTP;
    public $ID;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($OTP, $ID)
    {
        $this->OTP = $OTP;
        $this->ID = $ID;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.subscribed-email',['OTP' => $this->OTP, 'ID'=>$this->ID]);
    }
}
