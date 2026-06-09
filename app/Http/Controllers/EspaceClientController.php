<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class EspaceClientController extends Controller
{
    public function index()
    {
        $commandes = Commande::where('user_id', auth()->id())
                             ->orderBy('created_at', 'desc')
                             ->get();

        $totalDepense    = $commandes->sum('total_price');
        $nombreCommandes = $commandes->count();

        $depensesMoisActuel = Commande::where('user_id', auth()->id())
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');

        $depensesTrimestre = Commande::where('user_id', auth()->id())
            ->where('created_at', '>=', now()->subMonths(3))
            ->sum('total_price');

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

    public function show($id)
    {
        $commande = Commande::where('id', $id)
                            ->where('user_id', auth()->id())
                            ->firstOrFail();

        return view('espace-client.show', compact('commande'));
    }

    public function annuler(Commande $commande)
    {
        if ($commande->user_id !== auth()->id()) {
            abort(403);
        }

        if ($commande->status !== 'pending') {
            return redirect()->route('espace-client.index')
                             ->with('error', 'Cette commande ne peut plus être annulée.');
        }

        $commande->update(['status' => 'cancelled']);

        return redirect()->route('espace-client.index')
                         ->with('success', 'Votre commande a bien été annulée.');
    }
}