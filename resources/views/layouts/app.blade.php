<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnovShop — {{ $title ?? 'Bienvenue' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('accueil') }}">🛒 InnovShop</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
                <a class="nav-link" href="{{ route('catalogue') }}">Catalogue</a>

                @auth
                    <a class="nav-link" href="{{ route('panier.index') }}">Panier</a>
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        {{ Auth::user()->first_name }}
                    </a>
                    <a class="nav-link" href="{{ route('client.index') }}">Mon compte</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Déconnexion</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Contenu injecté via $slot --}}
    <main class="container my-4">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <small>© 2025 InnovShop — Tous droits réservés</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>