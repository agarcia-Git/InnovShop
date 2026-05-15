<?php

namespace App\Jobs;

use App\Mail\CommandeConfirmationMail;
use App\Models\Commande;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EnvoyerEmailCommande implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // On reçoit la commande dans le constructeur
    public function __construct(public Commande $commande)
    {
    }

    // Cette méthode est exécutée quand le Job est traité
    public function handle(): void
    {
        Mail::to($this->commande->user->email)
            ->send(new CommandeConfirmationMail($this->commande));
    }
}