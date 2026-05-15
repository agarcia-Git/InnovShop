<x-app-layout>
    <x-slot name="title">Passer commande</x-slot>

    <h2 class="mb-4">📦 Récapitulatif de votre commande</h2>

    {{-- Récapitulatif du panier --}}
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Votre panier</strong>
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
                    @foreach($lignes as $ligne)
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
                        <td><strong>{{ number_format($total, 2) }} €</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- Formulaire d'adresse de livraison --}}
    <div class="card">
        <div class="card-header bg-dark text-white">
            <strong>Adresse de livraison</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('commande.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="shipping_address" class="form-label">Adresse</label>
                    <input type="text" name="shipping_address" id="shipping_address"
                           class="form-control @error('shipping_address') is-invalid @enderror"
                           value="{{ old('shipping_address') }}" placeholder="12 rue de la Paix">
                    @error('shipping_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="shipping_postal_code" class="form-label">Code postal</label>
                        <input type="text" name="shipping_postal_code" id="shipping_postal_code"
                               class="form-control @error('shipping_postal_code') is-invalid @enderror"
                               value="{{ old('shipping_postal_code') }}" placeholder="75001">
                        @error('shipping_postal_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="shipping_city" class="form-label">Ville</label>
                        <input type="text" name="shipping_city" id="shipping_city"
                               class="form-control @error('shipping_city') is-invalid @enderror"
                               value="{{ old('shipping_city') }}" placeholder="Paris">
                        @error('shipping_city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="shipping_country" class="form-label">Pays</label>
                        <input type="text" name="shipping_country" id="shipping_country"
                               class="form-control @error('shipping_country') is-invalid @enderror"
                               value="{{ old('shipping_country') }}" placeholder="France">
                        @error('shipping_country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('panier.index') }}" class="btn btn-outline-secondary">
                        ← Retour au panier
                    </a>
                    <button type="submit" class="btn btn-success btn-lg">
                        ✅ Confirmer la commande
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>