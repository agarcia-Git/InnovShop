<x-app-layout>
    <x-slot name="title">Mon Panier</x-slot>

    <h2 class="mb-4">🛒 Mon Panier</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($lignes) > 0)

        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Produit</th>
                    <th>Option</th>
                    <th>Prix unitaire</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lignes as $ligne)
                    <tr>
                        <td>
                            <a href="{{ route('produit.show', $ligne['produit_id']) }}">
                                {{ $ligne['name'] }}
                            </a>
                        </td>
                        <td>
                            {{-- On affiche l'option si elle existe, sinon un tiret --}}
                            {{ $ligne['option'] ?? '—' }}
                        </td>
                        <td>{{ number_format($ligne['price'], 2) }} €</td>
                        <td>
                            <form action="{{ route('panier.supprimer', $ligne['uuid']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️ Retirer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="table-success">
                    <td><strong>Total</strong></td>
                    <td colspan="3"><strong>{{ number_format($total, 2) }} €</strong></td>
                </tr>
            </tfoot>
        </table>

        <div class="d-flex justify-content-end mt-3">
      <a href="{{ route('commande.index') }}" class="btn btn-success btn-lg">
        ✅ Passer la commande
    </a>
</div>

    @else
        <div class="alert alert-info">
            Votre panier est vide.
            <a href="{{ route('catalogue') }}">Continuer mes achats</a>
        </div>
    @endif

</x-app-layout>