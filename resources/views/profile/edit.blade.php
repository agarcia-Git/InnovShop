<x-app-layout>
    <x-slot name="title">Mon profil</x-slot>

    <h2 class="mb-4">⚙️ Mon profil</h2>

    <div class="row g-4">

        {{-- Informations du profil --}}
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title mb-1">👤 Informations personnelles</h5>
                    <p class="text-muted small mb-4">Modifiez votre nom et votre adresse email.</p>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        {{-- Mot de passe --}}
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title mb-1">🔒 Mot de passe</h5>
                    <p class="text-muted small mb-4">Utilisez un mot de passe long et aléatoire pour sécuriser votre compte.</p>
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        {{-- Suppression du compte --}}
        <div class="col-12">
            <div class="card border-0 shadow-sm border-danger">
                <div class="card-body p-4">
                    <h5 class="card-title text-danger mb-1">🗑️ Supprimer mon compte</h5>
                    <p class="text-muted small mb-4">Une fois supprimé, toutes vos données seront définitivement effacées.</p>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
</x-app-layout>