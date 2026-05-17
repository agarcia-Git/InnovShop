<x-app-layout>
    <x-slot name="title">Mon compte</x-slot>

    <h2 class="mb-4">👤 Mon espace client</h2>

    {{-- Statistiques --}}
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-primary">
                <div class="card-body">
                    <h3 class="text-primary fw-bold">{{ $nombreCommandes }}</h3>
                    <p class="text-muted mb-0">Commande(s) passée(s)</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-success">
                <div class="card-body">
                    <h3 class="text-success fw-bold">{{ number_format($totalDepense, 2) }} €</h3>
                    <p class="text-muted mb-0">Total dépensé</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-info">
                <div class="card-body">
                    <h3 class="text-info fw-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Historique des commandes --}}
    <h4 class="mb-3">📦 Historique des commandes</h4>

    @if($commandes->count() > 0)
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>N° commande</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $statuts = [
                        'pending'   => ['label' => 'En attente',  'badge' => 'bg-warning text-dark'],
                        'confirmed' => ['label' => 'Confirmée',   'badge' => 'bg-success'],
                        'shipped'   => ['label' => 'Expédiée',    'badge' => 'bg-info'],
                        'delivered' => ['label' => 'Livrée',      'badge' => 'bg-primary'],
                        'cancelled' => ['label' => 'Annulée',     'badge' => 'bg-danger'],
                    ];
                @endphp

                @foreach($commandes as $commande)
                    <tr>
                        <td><strong>#{{ $commande->id }}</strong></td>
                        <td>{{ $commande->created_at->format('d/m/Y à H:i') }}</td>
                        <td>
                            @php $statut = $statuts[$commande->status] ?? ['label' => $commande->status, 'badge' => 'bg-secondary']; @endphp
                            <span class="badge {{ $statut['badge'] }}">{{ $statut['label'] }}</span>
                        </td>
                        <td>{{ number_format($commande->total_price, 2) }} €</td>
                        <td>
                            <a href="{{ route('client.commande', $commande->id) }}"
                               class="btn btn-outline-primary btn-sm">
                                Voir le détail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Vous n'avez pas encore passé de commande.
            <a href="{{ route('catalogue') }}">Découvrir nos produits</a>
        </div>
    @endif

</x-app-layout>