<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Elements de contact
     * @var array
     */
    public $contact;

    /**
     * Créer une nouvelle instance de messagerie
     *
     * @return void
     */
    public function __construct(Array $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Construction du message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('monsite@chezmoi.com')
            ->view('mail');
    }
}
