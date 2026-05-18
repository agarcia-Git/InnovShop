
{{-- Cette vue hérite du layout admin --}}
@extends('admin.layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="row g-4">

    {{-- Carte statistique : nombre de produits --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Produits</h6>
                <h2>{{ $totalProduits }}</h2>
                <a href="{{ route('admin.produits.index') }}" class="btn btn-sm btn-primary mt-2">
                    Gérer les produits
                </a>
            </div>
        </div>
    </div>

    {{-- Carte statistique : nombre de commandes --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Commandes</h6>
                <h2>{{ $totalCommandes }}</h2>
                <a href="{{ route('admin.commandes.index') }}" class="btn btn-sm btn-warning mt-2">
                    Voir les commandes
                </a>
            </div>
        </div>
    </div>

    {{-- Carte statistique : nombre de clients --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Clients</h6>
                <h2>{{ $totalClients }}</h2>
                <a href="{{ route('admin.clients.index') }}" class="btn btn-sm btn-success mt-2">
                    Voir les clients
                </a>
            </div>
        </div>
    </div>

</div>
@endsection