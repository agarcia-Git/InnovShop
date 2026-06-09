<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="current_password" class="form-label">Mot de passe actuel</label>
        <input type="password" name="current_password" id="current_password"
               class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
               autocomplete="current-password">
        @error('current_password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Nouveau mot de passe</label>
        <input type="password" name="password" id="password"
               class="form-control @error('password', 'updatePassword') is-invalid @enderror"
               autocomplete="new-password">
        @error('password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
               class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
               autocomplete="new-password">
        @error('password_confirmation', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @if(session('status') === 'password-updated')
        <div class="alert alert-success py-2 mb-3">Mot de passe mis à jour avec succès !</div>
    @endif

    <button type="submit" class="btn btn-primary">
        💾 Mettre à jour le mot de passe
    </button>

</form>