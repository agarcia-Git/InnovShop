<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class EspaceClientController extends Controller
{
    // Page principale de l'espace client
    public function index()
{
    $commandes = Commande::where('user_id', auth()->id())
                         ->orderBy('created_at', 'desc')
                         ->get();

    $totalDepense    = $commandes->sum('total_price');
    $nombreCommandes = $commandes->count();

    // Dépenses du mois en cours
    $depensesMoisActuel = Commande::where('user_id', auth()->id())
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->sum('total_price');

    // Dépenses des 3 derniers mois
    $depensesTrimestre = Commande::where('user_id', auth()->id())
        ->where('created_at', '>=', now()->subMonths(3))
        ->sum('total_price');

    // Objectif mensuel fixé à 500€ par défaut
    $objectifMensuel  = 500;
    $pourcentageBudget = min(100, ($depensesMoisActuel / $objectifMensuel) * 100);

    return view('espace-client.index', compact(
        'commandes',
        'totalDepense',
        'nombreCommandes',
        'depensesMoisActuel',
        'depensesTrimestre',
        'objectifMensuel',
        'pourcentageBudget'
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

    // Annuler une commande
public function annuler(Commande $commande)
{
    // Vérifier que la commande appartient bien à l'utilisateur connecté
    if ($commande->user_id !== auth()->id()) {
        abort(403);
    }

    // On ne peut annuler que les commandes en attente
    if ($commande->status !== 'pending') {
        return redirect()->route('espace-client.index')
                         ->with('error', 'Cette commande ne peut plus être annulée.');
    }

    $commande->update(['status' => 'cancelled']);

    return redirect()->route('espace-client.index')
                     ->with('success', 'Votre commande a bien été annulée.');
}
}