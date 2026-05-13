<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnovShop — @yield('titre', 'Bienvenue')</title>
    {{-- Bootstrap 5 pour le style, via CDN --}}
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
                <a class="nav-link" href="{{ route('panier.index') }}">Panier</a>
            </div>
        </div>
    </nav>

    {{-- Contenu spécifique à chaque page --}}
    <main class="container my-4">
        @yield('contenu')
    </main>

    {{-- Footer --}}
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <small>© 2025 InnovShop — Tous droits réservés</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>