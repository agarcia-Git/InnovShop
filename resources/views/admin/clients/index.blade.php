@extends('admin.layouts.app')

@section('title', 'Gestion des clients')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Inscrit le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $client)
                <tr>
                    <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->address ?? '—' }}</td>
                    <td>{{ $client->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.clients.show', $client) }}"
                           class="btn btn-sm btn-primary">Voir</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Aucun client.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $clients->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection