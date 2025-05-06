<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Message;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;
    public $pdfContent;

    public function __construct($subject, $message, $pdfContent)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        $messageHtml = "<h1>$this->subject</h1>";
        $messageHtml .= "<p>$this->message</p>";

        return $this->subject($this->subject)
            ->attach($this->pdfContent)
            ->html($messageHtml);
    }


}
