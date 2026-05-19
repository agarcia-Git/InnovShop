@extends('admin.layouts.app')

@section('title', 'Client : ' . $client->first_name . ' ' . $client->last_name)

@section('content')

<div class="row g-4">

    {{-- Informations du client --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-3">Informations</h5>
                <p><strong>Prénom :</strong> {{ $client->first_name }}</p>
                <p><strong>Nom :</strong> {{ $client->last_name }}</p>
                <p><strong>Email :</strong> {{ $client->email }}</p>
                <p><strong>Adresse :</strong> {{ $client->address ?? '—' }}</p>
                <p><strong>Inscrit le :</strong> {{ $client->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>

    {{-- Historique des commandes --}}
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-3">
                    Historique des commandes
                    <span class="badge bg-secondary ms-2">{{ $commandes->count() }}</span>
                </h5>

                @if($commandes->isEmpty())
                    <p class="text-muted">Ce client n'a pas encore passé de commande.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $badges = [
                                    'pending'   => 'secondary',
                                    'confirmed' => 'primary',
                                    'shipped'   => 'info',
                                    'delivered' => 'success',
                                    'cancelled' => 'danger',
                                ];
                                $labels = [
                                    'pending'   => 'En attente',
                                    'confirmed' => 'Confirmée',
                                    'shipped'   => 'Expédiée',
                                    'delivered' => 'Livrée',
                                    'cancelled' => 'Annulée',
                                ];
                            @endphp
                            @foreach($commandes as $commande)
                            <tr>
                                <td>{{ $commande->id }}</td>
                                <td>{{ number_format($commande->total_price, 2) }} €</td>
                                <td>
                                    <span class="badge bg-{{ $badges[$commande->status] ?? 'secondary' }}">
                                        {{ $labels[$commande->status] ?? $commande->status }}
                                    </span>
                                </td>
                                <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.commandes.show', $commande) }}"
                                       class="btn btn-sm btn-outline-primary">Voir</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
        &larr; Retour aux clients
    </a>
</div>

@endsection