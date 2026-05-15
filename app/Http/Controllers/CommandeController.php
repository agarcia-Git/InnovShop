<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Panier;
use App\Http\Requests\CommandeRequest;
use App\Jobs\EnvoyerEmailCommande;

class CommandeController extends Controller
{
    // Afficher le récapitulatif du panier + formulaire d'adresse
    public function index()
    {
        $panier = Panier::where('user_id', auth()->id())->first();

        if (!$panier || empty($panier->products)) {
            return redirect()->route('catalogue')
                             ->with('error', 'Votre panier est vide.');
        }

        $lignes = $panier->products;
        $total  = $panier->total_price;

        return view('commande.index', compact('lignes', 'total'));
    }

    // Enregistrer la commande
    // La validation est gérée automatiquement par CommandeRequest
    public function store(CommandeRequest $request)
    {
        // Récupérer le panier de l'utilisateur connecté
        $panier = Panier::where('user_id', auth()->id())->first();

        if (!$panier || empty($panier->products)) {
            return redirect()->route('catalogue');
        }

        // Créer la commande en base de données
        $commande = Commande::create([
            'user_id'              => auth()->id(),
            'products'             => $panier->products,
            'total_price'          => $panier->total_price,
            'status'               => 'pending',
            'shipping_address'     => $request->shipping_address,
            'shipping_city'        => $request->shipping_city,
            'shipping_postal_code' => $request->shipping_postal_code,
            'shipping_country'     => $request->shipping_country,
        ]);

        // Vider le panier après la commande
        $panier->products    = [];
        $panier->total_price = 0;
        $panier->save();

    // Déclencher le Job d'envoi d'email en arrière-plan
        EnvoyerEmailCommande::dispatch($commande);
        return redirect()->route('commande.confirmation', $commande->id);
    }

    // Page de confirmation
    public function confirmation($id)
    {
        $commande = Commande::where('id', $id)
                            ->where('user_id', auth()->id())
                            ->firstOrFail();

        return view('commande.confirmation', compact('commande'));
    }
}