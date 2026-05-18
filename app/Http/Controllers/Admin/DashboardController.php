<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            // On compte directement en base avec Eloquent — propre et efficace
            'totalProduits'  => Produit::count(),
            'totalCommandes' => Commande::count(),
            // On ne compte que les clients, pas les admins
            'totalClients'   => User::where('role', 'customer')->count(),
        ]);
    }
}