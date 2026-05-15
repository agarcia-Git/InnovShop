<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;

// ── Routes publiques ──────────────────────────────────────────
// Page d'accueil
Route::get('/', [ProduitController::class, 'index'])->name('accueil');

// Catalogue
Route::get('/catalogue', [ProduitController::class, 'catalogue'])->name('catalogue');

// Détail d'un produit
Route::get('/produit/{produit}', [ProduitController::class, 'show'])->name('produit.show');

// ── Routes protégées (utilisateur connecté uniquement) ────────
Route::middleware('auth')->group(function () {
   
    // Panier
    Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
    Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
    Route::delete('/panier/supprimer/{uuid}', [PanierController::class, 'supprimer'])->name('panier.supprimer');

    // Commandes
    Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');
    Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
    Route::get('/commande/confirmation/{id}', [CommandeController::class, 'confirmation'])->name('commande.confirmation');

    // Profil utilisateur (généré par Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Breeze
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ── Routes d'authentification Breeze ─────────────────────────
require __DIR__.'/auth.php';