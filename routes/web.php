<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\EspaceClientController;



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

    // Espace client
    Route::get('/mon-compte', [EspaceClientController::class, 'index'])->name('client.index');
    Route::get('/mon-compte/commande/{id}', [EspaceClientController::class, 'show'])->name('client.commande');

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

// Groupe de routes protégées par le middleware admin
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        // Tableau de bord
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Gestion des produits
        Route::resource('produits', \App\Http\Controllers\Admin\ProduitController::class);

        // Gestion des commandes
        Route::resource('commandes', \App\Http\Controllers\Admin\CommandeController::class)
            ->only(['index', 'show', 'update']);

        // Gestion des clients
        Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class)
            ->only(['index', 'show']);

            Route::post('/espace-client/commandes/{commande}/annuler', 
           [EspaceClientController::class, 'annuler'])
           ->name('espace-client.annuler');
    });