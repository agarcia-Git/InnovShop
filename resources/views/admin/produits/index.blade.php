@extends('admin.layouts.app')

@section('title', 'Gestion des produits')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <a href="{{ route('admin.produits.create') }}" class="btn btn-primary">
        + Ajouter un produit
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Disponibilité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produits as $produit)
                <tr>
                    <td>
                        @if($produit->image)
                            <img src="{{ asset('storage/' . $produit->image) }}"
                                 width="50" height="50"
                                 style="object-fit:cover; border-radius:4px;">
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>{{ $produit->name }}</td>
                    <td>{{ number_format($produit->price, 2) }} €</td>
                    <td>
                        @if($produit->availability)
                            <span class="badge bg-success">Disponible</span>
                        @else
                            <span class="badge bg-danger">Indisponible</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.produits.edit', $produit) }}"
                           class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('admin.produits.destroy', $produit) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Supprimer ce produit ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Aucun produit pour le moment.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $produits->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection