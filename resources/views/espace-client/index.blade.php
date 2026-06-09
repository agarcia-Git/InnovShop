<x-app-layout>
    <x-slot name="title">Mon compte</x-slot>

    <h2 class="mb-4">👤 Mon espace client</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-primary">
                <div class="card-body">
                    <h3 class="text-primary fw-bold">{{ $nombreCommandes }}</h3>
                    <p class="text-muted mb-0">Commande(s) passée(s)</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-success">
                <div class="card-body">
                    <h3 class="text-success fw-bold">{{ number_format($totalDepense, 2) }} €</h3>
                    <p class="text-muted mb-0">Total dépensé</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-info">
                <div class="card-body">
                    <h3 class="text-info fw-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3">📦 Historique des commandes</h4>

    @if($commandes->count() > 0)
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>N° commande</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $statuts = [
                        'pending'   => ['label' => 'En attente',  'badge' => 'bg-warning text-dark'],
                        'confirmed' => ['label' => 'Confirmée',   'badge' => 'bg-success'],
                        'shipped'   => ['label' => 'Expédiée',    'badge' => 'bg-info'],
                        'delivered' => ['label' => 'Livrée',      'badge' => 'bg-primary'],
                        'cancelled' => ['label' => 'Annulée',     'badge' => 'bg-danger'],
                    ];
                @endphp

                @foreach($commandes as $commande)
                    <tr>
                        <td><strong>#{{ $commande->id }}</strong></td>
                        <td>{{ $commande->created_at->format('d/m/Y à H:i') }}</td>
                        <td>
                            @php $statut = $statuts[$commande->status] ?? ['label' => $commande->status, 'badge' => 'bg-secondary']; @endphp
                            <span class="badge {{ $statut['badge'] }}">{{ $statut['label'] }}</span>
                        </td>
                        <td>{{ number_format($commande->total_price, 2) }} €</td>
                        <td>
                            <a href="{{ route('client.commande', $commande->id) }}"
                               class="btn btn-outline-primary btn-sm">
                                Voir le détail
                            </a>
                            @if($commande->status === 'pending')
                                <form action="{{ route('espace-client.annuler', $commande) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette commande ?')">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm ms-1">
                                        Annuler
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Vous n'avez pas encore passé de commande.
            <a href="{{ route('catalogue') }}">Découvrir nos produits</a>
        </div>
    @endif

    <h4 class="mb-3 mt-5">💰 Suivi de mes dépenses</h4>
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted">Dépenses ce mois-ci</h6>
                    <h4 class="fw-bold text-danger">{{ number_format($depensesMoisActuel, 2) }} €</h4>
                    <p class="text-muted small mb-1">Objectif mensuel : {{ number_format($objectifMensuel, 2) }} €</p>
                    <div class="progress" style="height: 12px;">
                        <div class="progress-bar {{ $pourcentageBudget >= 100 ? 'bg-danger' : ($pourcentageBudget >= 75 ? 'bg-warning' : 'bg-success') }}"
                             role="progressbar"
                             style="width: {{ $pourcentageBudget }}%">
                        </div>
                    </div>
                    <p class="text-muted small mt-1">
                        {{ number_format($pourcentageBudget, 0) }}% de votre budget mensuel utilisé
                        @if($pourcentageBudget >= 100)
                            <span class="text-danger fw-bold">— Budget dépassé !</span>
                        @elseif($pourcentageBudget >= 75)
                            <span class="text-warning fw-bold">— Attention, budget presque atteint</span>
                        @else
                            <span class="text-success">— Budget maîtrisé ✅</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted">Dépenses ces 3 derniers mois</h6>
                    <h4 class="fw-bold text-warning">{{ number_format($depensesTrimestre, 2) }} €</h4>
                    <p class="text-muted small">
                        Soit une moyenne de <strong>{{ number_format($depensesTrimestre / 3, 2) }} € / mois</strong>
                    </p>
                    <h6 class="text-muted mt-3">Total dépensé depuis le début</h6>
                    <h4 class="fw-bold text-primary">{{ number_format($totalDepense, 2) }} €</h4>
                    <p class="text-muted small">Sur {{ $nombreCommandes }} commande(s) passée(s).</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>