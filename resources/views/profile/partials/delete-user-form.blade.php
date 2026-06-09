<form method="POST" action="{{ route('profile.destroy') }}"
      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer définitivement votre compte ? Cette action est irréversible.')">
    @csrf
    @method('delete')

    <div class="mb-3">
        <label for="password" class="form-label">Confirmez votre mot de passe</label>
        <input type="password" name="password" id="password"
               class="form-control @error('password', 'userDeletion') is-invalid @enderror"
               placeholder="Votre mot de passe actuel">
        @error('password', 'userDeletion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-danger">
        🗑️ Supprimer définitivement mon compte
    </button>
</form>