<form id="send-verification" method="POST" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label for="first_name" class="form-label">Prénom</label>
        <input type="text" name="first_name" id="first_name"
               class="form-control @error('first_name') is-invalid @enderror"
               value="{{ old('first_name', $user->first_name) }}"
               required autofocus autocomplete="given-name">
        @error('first_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Nom</label>
        <input type="text" name="last_name" id="last_name"
               class="form-control @error('last_name') is-invalid @enderror"
               value="{{ old('last_name', $user->last_name) }}"
               required autocomplete="family-name">
        @error('last_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" name="email" id="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $user->email) }}"
               required autocomplete="username">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="text-muted small">
                    Votre adresse email n'est pas vérifiée.
                    <button form="send-verification" class="btn btn-link btn-sm p-0">
                        Cliquez ici pour renvoyer l'email de vérification.
                    </button>
                </p>
                @if (session('status') === 'verification-link-sent')
                    <p class="text-success small mt-1">Un nouveau lien de vérification a été envoyé.</p>
                @endif
            </div>
        @endif
    </div>

    <div class="mb-4">
        <label for="address" class="form-label">Adresse de livraison</label>
        <input type="text" name="address" id="address"
               class="form-control @error('address') is-invalid @enderror"
               value="{{ old('address', $user->address) }}"
               autocomplete="street-address">
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @if(session('status') === 'profile-updated')
        <div class="alert alert-success py-2 mb-3">Profil mis à jour avec succès !</div>
    @endif

    <button type="submit" class="btn btn-primary">
        💾 Sauvegarder
    </button>

</form>