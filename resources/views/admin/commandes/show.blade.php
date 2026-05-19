@extends('admin.layouts.app')

@section('title', 'Commande #' . $commande->id)

@section('content')

<div class="row g-4">

    {{-- Informations client et livraison --}}
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title mb-3">Informations client</h5>
                <p><strong>Nom :</strong> {{ $commande->user->first_name }} {{ $commande->user->last_name }}</p>
                <p><strong>Email :</strong> {{ $commande->user->email }}</p>
                <hr>
                <h5 class="mb-3">Adresse de livraison</h5>
                <p>
                    {{ $commande->shipping_address }}<br>
                    {{ $commande->shipping_postal_code }} {{ $commande->shipping_city }}<br>
                    {{ $commande->shipping_country }}
                </p>
            </div>
        </div>
    </div>

    {{-- Mise à jour du statut --}}
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title mb-3">Statut de la commande</h5>
                <form action="{{ route('admin.commandes.update', $commande) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <select name="status" class="form-select">
                            @foreach(['pending' => 'En attente', 'confirmed' => 'Confirmée', 'shipped' => 'Expédiée', 'delivered' => 'Livrée', 'cancelled' => 'Annulée'] as $value => $label)
                                <option value="{{ $value }}"
                                    {{ $commande->status === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Liste des produits commandés --}}
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-3">Produits commandés</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Sous-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- products est casté en array, on peut le parcourir directement --}}
                        @foreach($commande->products as $produit)
                        <tr>
                            <td>{{ $produit['name'] ?? 'Produit inconnu' }}</td>
                            <td>{{ $produit['quantity'] ?? 1 }}</td>
                            <td>{{ number_format($produit['price'] ?? 0, 2) }} €</td>
                            <td>{{ number_format(($produit['price'] ?? 0) * ($produit['quantity'] ?? 1), 2) }} €</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Total :</td>
                            <td class="fw-bold">{{ number_format($commande->total_price, 2) }} €</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('admin.commandes.index') }}" class="btn btn-secondary">
        &larr; Retour aux commandes
    </a>
</div>

@endsection