<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    public $prenom;
    public $nom;
    public $reply_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($prenom, $nom, $reply_message)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->reply_message = $reply_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_reply')
                    ->subject('Réponse à votre demande de contact');
    }
}
