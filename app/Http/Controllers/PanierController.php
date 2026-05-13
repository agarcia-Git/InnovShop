<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PanierController extends Controller
{
    // Afficher le panier de l'utilisateur connecté
    public function index()
    {
        $panier = Panier::where('user_id', 1)->first();
        $lignes = $panier ? ($panier->products ?? []) : [];
        $total  = $panier ? $panier->total_price : 0;

        return view('panier.index', compact('lignes', 'total'));
    }

    // Ajouter un produit au panier
    public function ajouter($produitId)
    {
        $produit = Produit::findOrFail($produitId);

        // Récupérer ou créer le panier de l'utilisateur
        $panier = Panier::firstOrCreate(
            ['user_id' => 1],
            ['products' => [], 'total_price' => 0]
        );

        // Récupérer les lignes existantes
        $lignes = $panier->products ?? [];

        // Chaque ajout crée une nouvelle ligne avec un UUID unique
        $lignes[] = [
            'uuid'      => (string) Str::uuid(),
            'produit_id'=> $produit->id,
            'name'      => $produit->name,
            'price'     => $produit->price,
        ];

        // Recalculer le total
        $total = collect($lignes)->sum('price');

        // Sauvegarder
        $panier->products    = $lignes;
        $panier->total_price = $total;
        $panier->save();

        return redirect()->route('panier.index')
                         ->with('success', '✅ Produit ajouté au panier !');
    }

    // Supprimer une ligne du panier par son UUID
    public function supprimer($uuid)
    {
        $panier = Panier::where('user_id', 1)->first();

        if (!$panier) {
            return redirect()->route('panier.index');
        }

        // Filtrer les lignes en excluant celle avec l'UUID ciblé
        $lignes = collect($panier->products)
                    ->reject(fn($ligne) => $ligne['uuid'] === $uuid)
                    ->values()
                    ->toArray();

        // Recalculer le total
        $total = collect($lignes)->sum('price');

        $panier->products    = $lignes;
        $panier->total_price = $total;
        $panier->save();

        return redirect()->route('panier.index')
                         ->with('success', '🗑️ Produit retiré du panier.');
    }
}