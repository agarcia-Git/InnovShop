<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnovShop Admin — <?php echo $__env->yieldContent('title', 'Tableau de bord'); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* La sidebar occupe toute la hauteur de l'écran */
        .sidebar { min-height: 100vh; background-color: #212529; }
        .sidebar a { color: #adb5bd; text-decoration: none; }
        .sidebar a:hover { color: #ffffff; }
        .sidebar a.active { color: #ffffff; font-weight: bold; }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row">

        
        <nav class="col-md-2 sidebar p-3">
            <h5 class="text-white mb-4">⚙️ Admin</h5>
            <ul class="nav flex-column gap-2">
                <li>
                    <a href="<?php echo e(route('admin.dashboard')); ?>"
                       class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                        🏠 Tableau de bord
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.produits.index')); ?>"
                       class="<?php echo e(request()->routeIs('admin.produits.*') ? 'active' : ''); ?>">
                        📦 Produits
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.commandes.index')); ?>"
                       class="<?php echo e(request()->routeIs('admin.commandes.*') ? 'active' : ''); ?>">
                        🛒 Commandes
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.clients.index')); ?>"
                       class="<?php echo e(request()->routeIs('admin.clients.*') ? 'active' : ''); ?>">
                        👥 Clients
                    </a>
                </li>
            </ul>

            
            <hr class="border-secondary mt-4">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                    Déconnexion
                </button>
            </form>
        </nav>

        
        <main class="col-md-10 p-4">

            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3"><?php echo $__env->yieldContent('title', 'Tableau de bord'); ?></h1>
                <span class="text-muted small">
                    Connecté en tant que <strong><?php echo e(auth()->user()->first_name); ?></strong>
                </span>
            </div>

            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            
            <?php echo $__env->yieldContent('content'); ?>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\wamp64\www\InnovShop\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>