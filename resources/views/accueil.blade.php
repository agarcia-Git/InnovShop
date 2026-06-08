<x-app-layout>
    <x-slot name="title">Accueil</x-slot>

    <h2 class="mb-4">🆕 Derniers produits</h2>
    <div class="row">
        @forelse($derniersProduits as $produit)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $produit->image ? asset('storage/' . $produit->image) : 'https://placehold.co/300x200' }}"
                       class="card-img-top" alt="{{ $produit->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->name }}</h5>
                        <p class="text-success fw-bold">{{ number_format($produit->price, 2) }} €</p>
                        <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-primary btn-sm">Voir le produit</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Aucun produit disponible pour le moment.</p>
        @endforelse
    </div>

    <hr class="my-5">

    <h2 class="mb-4">⭐ Produits à la une</h2>
    <div class="row">
        @forelse($produitsUne as $produit)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-warning">
                    <img src="{{ $produit->image ? asset('storage/' . $produit->image) : 'https://placehold.co/300x200' }}"
                     class="card-img-top" alt="{{ $produit->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->name }}</h5>
                        <p class="text-success fw-bold">{{ number_format($produit->price, 2) }} €</p>
                        <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-warning btn-sm">Voir le produit</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Aucun produit à la une pour le moment.</p>
        @endforelse
    </div>

</x-app-layout>