<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Page d'accueil : 3 derniers produits + 3 produits à la une
    public function index()
    {
        $derniersProduits = Produit::orderBy('created_at', 'desc')->take(3)->get();
        $produitsUne = Produit::where('is_featured', true)->take(3)->get();

        return view('accueil', compact('derniersProduits', 'produitsUne'));
    }

    // Page catalogue : tous les produits
    public function catalogue()
    {
        $produits = Produit::orderBy('name', 'asc')->get();

        return view('catalogue', compact('produits'));
    }

    // Page détail d'un produit
    public function show(Produit $produit)
    {
        // findOrFail déclenche automatiquement une 404 si le produit n'existe pas
        

        return view('produit.show', compact('produit'));
    }
}