@extends('admin.layouts.app')

@section('title', 'Ajouter un produit')

@section('content')

<div class="card border-0 shadow-sm" style="max-width: 700px;">
    <div class="card-body">
        <form action="{{ route('admin.produits.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nom du produit</label>
                <input type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4"
                          class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Spécifications</label>
                <textarea name="specifications" rows="3"
                          class="form-control">{{ old('specifications') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Prix (€)</label>
                <input type="number" name="price" step="0.01" min="0"
                       class="form-control @error('price') is-invalid @enderror"
                       value="{{ old('price') }}">
                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="availability" value="1"
                           class="form-check-input" id="availability"
                           {{ old('availability') ? 'checked' : '' }}>
                    <label class="form-check-label" for="availability">Disponible à la vente</label>
                </div>
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input type="checkbox" name="is_featured" value="1"
                           class="form-check-input" id="is_featured"
                           {{ old('is_featured') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">Produit mis en avant</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">Annuler</a>
            </div>

        </form>
    </div>
</div>

@endsection