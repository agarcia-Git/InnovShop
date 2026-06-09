<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'InnovShop') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
                min-height: 100vh;
            }
            .auth-card {
                border-radius: 16px;
                border: none;
                box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            }
            .auth-brand {
               font-size: 1.8rem;
               font-weight: 700;
               color: #ffffff;
               letter-spacing: -0.5px;
           }
            
            .auth-brand span {
                color: #e07b39;
            }
            .auth-subtitle {
                color: #6c757d;
                font-size: 0.9rem;
            }
            .btn-auth {
                background-color: #e07b39;
                border: none;
                color: white;
                padding: 10px;
                font-weight: 600;
                border-radius: 8px;
                transition: background-color 0.2s;
            }
            .btn-auth:hover {
                background-color: #c96a2a;
                color: white;
            }
            .form-control:focus {
                border-color: #e07b39;
                box-shadow: 0 0 0 0.2rem rgba(224,123,57,0.25);
            }
        </style>
    </head>
    <body>
        <div class="min-vh-100 d-flex align-items-center justify-content-center p-3">
            <div class="w-100" style="max-width: 420px;">

                {{-- Logo et titre --}}
                <div class="text-center mb-4">
                    <a href="/" class="text-decoration-none">
                        <div class="auth-brand">
                            🛒 Innov<span>Shop</span>
                        </div>
                    </a>
                    <p class="auth-subtitle mt-1">Votre boutique tech en ligne</p>
                </div>

                {{-- Carte du formulaire --}}
                <div class="card auth-card p-4">
                    {{ $slot }}
                </div>

                {{-- Lien retour accueil --}}
                <div class="text-center mt-3">
                    <a href="/" class="text-white-50 text-decoration-none small">
                        ← Retour à l'accueil
                    </a>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>