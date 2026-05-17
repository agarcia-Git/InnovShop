<x-app-layout>
    <x-slot name="title">Commande #{{ $commande->id }}</x-slot>

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('accueil') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Mon compte</a></li>
            <li class="breadcrumb-item active">Commande #{{ $commande->id }}</li>
        </ol>
    </nav>

    <h2 class="mb-4">📦 Commande n°{{ $commande->id }}</h2>

    {{-- Informations générales --}}
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Informations générales</strong>
        </div>
        <div class="card-body">
            <p class="mb-1">
                <strong>Date :</strong> {{ $commande->created_at->format('d/m/Y à H:i') }}
            </p>
            <p class="mb-0">
                <strong>Statut :</strong>
                @php
                    $statuts = [
                        'pending'   => ['label' => 'En attente',  'badge' => 'bg-warning text-dark'],
                        'confirmed' => ['label' => 'Confirmée',   'badge' => 'bg-success'],
                        'shipped'   => ['label' => 'Expédiée',    'badge' => 'bg-info'],
                        'delivered' => ['label' => 'Livrée',      'badge' => 'bg-primary'],
                        'cancelled' => ['label' => 'Annulée',     'badge' => 'bg-danger'],
                    ];
                    $statut = $statuts[$commande->status] ?? ['label' => $commande->status, 'badge' => 'bg-secondary'];
                @endphp
                <span class="badge {{ $statut['badge'] }}">{{ $statut['label'] }}</span>
            </p>
        </div>
    </div>

    {{-- Détail des produits --}}
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Produits commandés</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Produit</th>
                        <th>Option</th>
                        <th>Prix unitaire</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commande->products as $ligne)
                        <tr>
                            <td>{{ $ligne['name'] }}</td>
                            <td>{{ $ligne['option'] ?? '—' }}</td>
                            <td>{{ number_format($ligne['price'], 2) }} €</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-success">
                        <td colspan="2"><strong>Total</strong></td>
                        <td><strong>{{ number_format($commande->total_price, 2) }} €</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- Adresse de livraison --}}
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Adresse de livraison</strong>
        </div>
        <div class="card-body">
            <p class="mb-1">{{ $commande->shipping_address }}</p>
            <p class="mb-1">{{ $commande->shipping_postal_code }} {{ $commande->shipping_city }}</p>
            <p class="mb-0">{{ $commande->shipping_country }}</p>
        </div>
    </div>

    <a href="{{ route('client.index') }}" class="btn btn-outline-secondary">
        ← Retour à mon compte
    </a>

</x-app-layout>