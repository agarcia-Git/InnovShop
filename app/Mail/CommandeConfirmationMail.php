<?php

namespace App\Mail;

use App\Models\Commande;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommandeConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    // On passe la commande au constructeur pour l'utiliser dans la vue email
    public function __construct(public Commande $commande)
    {
    }

    // Le sujet et l'expéditeur de l'email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de votre commande n°' . $this->commande->id,
        );
    }

    // La vue Blade qui sera utilisée pour le contenu de l'email
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.commande-confirmation',
        );
    }
}