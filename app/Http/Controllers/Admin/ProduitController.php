<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Liste tous les produits
    public function index()
    {
        $produits = Produit::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.produits.index', compact('produits'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('admin.produits.create');
    }

    // Enregistre un nouveau produit
    public function store(Request $request)
    {
      $validated = $request->validate([
       'name'           => 'required|string|max:255',
       'description'    => 'nullable|string',
       'specifications' => 'nullable|string',
       'price'          => 'required|numeric|min:0',
       'availability'   => 'boolean',
       'is_featured'    => 'boolean',
       'image'          => 'nullable|image|max:2048',
]);
    // Les checkboxes non cochées ne sont pas envoyées par le navigateur,
    // il faut donc forcer leur valeur à false si absentes de la requête
      $validated['availability'] = $request->boolean('availability');
      $validated['is_featured']  = $request->boolean('is_featured');

      
        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('produits', 'public');
        }

        Produit::create($validated);

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit créé avec succès.');
    }

    // Affiche le formulaire d'édition
    public function edit(Produit $produit)
    {
        return view('admin.produits.edit', compact('produit'));
    }

    // Met à jour un produit existant
    public function update(Request $request, Produit $produit)
    {
      $validated = $request->validate([
       'name'           => 'required|string|max:255',
       'description'    => 'nullable|string',
       'specifications' => 'nullable|string',
       'price'          => 'required|numeric|min:0',
       'availability'   => 'boolean',
       'is_featured'    => 'boolean',
       'image'          => 'nullable|image|max:2048',
]);

   // Les checkboxes non cochées ne sont pas envoyées par le navigateur,
   // il faut donc forcer leur valeur à false si absentes de la requête
     $validated['availability'] = $request->boolean('availability');
     $validated['is_featured']  = $request->boolean('is_featured');

        // On remplace l'image seulement si une nouvelle est uploadée
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('produits', 'public');
        }

        $produit->update($validated);

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    // Supprime un produit
    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}