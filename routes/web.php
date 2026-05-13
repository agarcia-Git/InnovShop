<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

// Page d'accueil
Route::get('/', [ProduitController::class, 'index'])->name('accueil');

// Catalogue
Route::get('/catalogue', [ProduitController::class, 'catalogue'])->name('catalogue');

// Détail d'un produit
Route::get('/produit/{id}', [ProduitController::class, 'show'])->name('produit.show');


use App\Http\Controllers\PanierController;

// Panier
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::delete('/panier/supprimer/{uuid}', [PanierController::class, 'supprimer'])->name('panier.supprimer');