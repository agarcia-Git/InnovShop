<x-app-layout>
    <x-slot name="title">Commande confirmée</x-slot>

    <div class="text-center my-5">
        <div class="mb-4" style="font-size: 5rem;">🎉</div>
        <h2 class="mb-3">Merci pour votre commande !</h2>
        <p class="text-muted fs-5">
            Votre commande n°<strong>{{ $commande->id }}</strong> a bien été enregistrée

            @php
        $statuts = ['pending' => 'En attente', 'confirmed' => 'Confirmée', 'shipped' => 'Expédiée', 'delivered' => 'Livrée', 'cancelled' => 'Annulée'];
    @endphp
          avec le statut <span class="badge bg-warning text-dark">{{ $statuts[$commande->status] ?? $commande->status }}</span>.
        </p>
        
        <p class="text-muted">Un email récapitulatif vous sera envoyé prochainement.</p>
    </div>

    {{-- Récapitulatif de la commande --}}
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Détail de la commande</strong>
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

    <div class="text-center">
        <a href="{{ route('accueil') }}" class="btn btn-primary">
            🏠 Retour à l'accueil
        </a>
    </div>

</x-app-layout>