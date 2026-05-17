<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class EspaceClientController extends Controller
{
    // Page principale de l'espace client
    public function index()
    {
        // Récupérer toutes les commandes de l'utilisateur connecté
        // triées de la plus récente à la plus ancienne
        $commandes = Commande::where('user_id', auth()->id())
                             ->orderBy('created_at', 'desc')
                             ->get();

        // Calculer le total dépensé par le client
        $totalDepense = $commandes->sum('total_price');

        // Nombre de commandes passées
        $nombreCommandes = $commandes->count();

        return view('espace-client.index', compact(
            'commandes',
            'totalDepense',
            'nombreCommandes'
        ));
    }

    // Détail d'une commande
    public function show($id)
    {
        $commande = Commande::where('id', $id)
                            ->where('user_id', auth()->id())
                            ->firstOrFail();

        return view('espace-client.show', compact('commande'));
    }
}