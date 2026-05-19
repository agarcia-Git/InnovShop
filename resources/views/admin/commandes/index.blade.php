@extends('admin.layouts.app')

@section('title', 'Gestion des commandes')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->user->first_name }} {{ $commande->user->last_name }}</td>
                    <td>{{ number_format($commande->total_price, 2) }} €</td>
                    <td>
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
                        <span class="badge bg-{{ $badges[$commande->status] ?? 'secondary' }}">
                            {{ $labels[$commande->status] ?? $commande->status }}
                        </span>
                    </td>
                    <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.commandes.show', $commande) }}"
                           class="btn btn-sm btn-primary">Voir</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Aucune commande.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $commandes->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection