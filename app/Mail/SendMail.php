<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use stdClass;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
 
    public function __construct(stdClass $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('assunto');
        $this->to('leoaugusto45@gmail.com');

        return $this->view('mail.sendmail');
    }
}
