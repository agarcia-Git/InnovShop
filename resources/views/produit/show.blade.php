<x-app-layout>
    <x-slot name="title">{{ $produit->name }}</x-slot>

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('accueil') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('catalogue') }}">Catalogue</a></li>
            <li class="breadcrumb-item active">{{ $produit->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-5">
            <img src="{{ $produit->image ?? 'https://placehold.co/500x400' }}"
                 class="img-fluid rounded shadow" alt="{{ $produit->name }}">
        </div>
        <div class="col-md-7">
            <h1 class="mb-3">{{ $produit->name }}</h1>
            <p class="fs-3 text-success fw-bold">{{ number_format($produit->price, 2) }} €</p>

            @if($produit->availability)
                <span class="badge bg-success mb-3">En stock</span>
            @else
                <span class="badge bg-danger mb-3">Rupture de stock</span>
            @endif

            <p class="text-muted">{{ $produit->description }}</p>

            @if($produit->specifications)
                <h5 class="mt-4">Spécifications</h5>
                <p>{{ $produit->specifications }}</p>
            @endif

            @if($produit->options && count($produit->options) > 0)
                <h5 class="mt-4">Options disponibles</h5>
                <div class="d-flex flex-wrap gap-2">
                    @php
                        $couleurs = [
                            'bleu' => '#2563eb', 'noir' => '#1a1a1a', 'blanc' => '#f8f9fa',
                            'rouge' => '#dc2626', 'vert' => '#16a34a', 'jaune' => '#eab308',
                            'gris' => '#6b7280', 'rose' => '#ec4899', 'orange' => '#ea580c',
                            'violet' => '#7c3aed',
                        ];
                    @endphp
                    @foreach(\Illuminate\Support\Arr::flatten($produit->options) as $option)
                        @php $couleurCss = $couleurs[strtolower($option)] ?? null; @endphp
                        @if($couleurCss)
                            <span class="badge fs-6 border"
                                  style="background-color: {{ $couleurCss }}; color: {{ in_array(strtolower($option), ['blanc', 'jaune']) ? '#333' : '#fff' }}; border-color: #ccc !important;">
                                {{ $option }}
                            </span>
                        @else
                            <span class="badge bg-secondary fs-6">{{ $option }}</span>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="mt-4">
                @auth
                    <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg">🛒 Ajouter au panier</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">
                        🔒 Connectez-vous pour ajouter au panier
                    </a>
                @endauth
            </div>
        </div>
    </div>

</x-app-layout>