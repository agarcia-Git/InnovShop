<x-app-layout>
    <x-slot name="title">Catalogue</x-slot>

    <h2 class="mb-4">📦 Catalogue des produits</h2>
    <div class="row">
        @forelse($produits as $produit)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $produit->image ?? 'https://placehold.co/300x200' }}"
                         class="card-img-top" alt="{{ $produit->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $produit->name }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($produit->description, 80) }}</p>
                        <p class="text-success fw-bold mt-auto">{{ number_format($produit->price, 2) }} €</p>
                        <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-primary btn-sm">Voir le produit</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Le catalogue est vide pour le moment.</p>
        @endforelse
    </div>

</x-app-layout>