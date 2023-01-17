<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data=[];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('shieldz.co@gmail.com', 'Testing')
                    ->subject($this->data["subject"])
                    ->view('mail.verify_mail')
                    ->with("data",$this->data);
    }
}
