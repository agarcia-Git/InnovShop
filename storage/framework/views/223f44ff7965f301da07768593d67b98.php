<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnovShop — <?php echo e($title ?? 'Bienvenue'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('accueil')); ?>">🛒 InnovShop</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo e(route('accueil')); ?>">Accueil</a>
                <a class="nav-link" href="<?php echo e(route('catalogue')); ?>">Catalogue</a>

                <?php if(auth()->guard()->check()): ?>
                    <a class="nav-link" href="<?php echo e(route('panier.index')); ?>">Panier</a>
                    <a class="nav-link" href="<?php echo e(route('profile.edit')); ?>">
                        <?php echo e(Auth::user()->first_name); ?>

                    </a>
                    <a class="nav-link" href="<?php echo e(route('client.index')); ?>">Mon compte</a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link btn btn-link">Déconnexion</button>
                    </form>
                <?php else: ?>
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Connexion</a>
                    <a class="nav-link" href="<?php echo e(route('register')); ?>">Inscription</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    
    <main class="container my-4">
        <?php echo e($slot); ?>

    </main>

    
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <small>© 2025 InnovShop — Tous droits réservés</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\wamp64\www\InnovShop\resources\views/layouts/app.blade.php ENDPATH**/ ?>