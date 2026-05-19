<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ClientController extends Controller
{
    // Liste tous les clients (pas les admins)
    public function index()
    {
        $clients = User::where('role', 'customer')
                       ->orderBy('last_name')
                       ->paginate(15);

        return view('admin.clients.index', compact('clients'));
    }

    // Affiche le profil d'un client et son historique de commandes
    public function show(User $client)
    {
        // On charge les commandes de ce client, les plus récentes en premier
        $commandes = $client->commandes()
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('admin.clients.show', compact('client', 'commandes'));
    }
}