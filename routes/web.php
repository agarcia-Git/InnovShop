<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

// Page d'accueil
Route::get('/', [ProduitController::class, 'index'])->name('accueil');

// Catalogue
Route::get('/catalogue', [ProduitController::class, 'catalogue'])->name('catalogue');

// Détail d'un produit
Route::get('/produit/{id}', [ProduitController::class, 'show'])->name('produit.show');