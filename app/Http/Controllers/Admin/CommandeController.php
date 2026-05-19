<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    // Liste toutes les commandes, les plus récentes en premier
    public function index()
    {
        $commandes = Commande::with('user')
                             ->orderBy('created_at', 'desc')
                             ->paginate(15);

        return view('admin.commandes.index', compact('commandes'));
    }

    // Affiche le détail d'une commande
    public function show(Commande $commande)
    {
        $commande->load('user');
        return view('admin.commandes.show', compact('commande'));
    }

    // Met à jour le statut d'une commande
    public function update(Request $request, Commande $commande)
    {
        $request->validate([
            // On valide que la valeur envoyée est bien l'une des valeurs de l'ENUM
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
        ]);

        $commande->update(['status' => $request->status]);

        return redirect()->route('admin.commandes.show', $commande)
                         ->with('success', 'Statut mis à jour avec succès.');
    }
}