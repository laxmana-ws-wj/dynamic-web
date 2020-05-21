<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class Contactemail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function build()
    {
        return $this->from('pranavghodake308@gmail.com', 'Rucha Sanstha')
                    ->subject('New Enquiry')
                    ->markdown('emails.contactemail');
    }
}
