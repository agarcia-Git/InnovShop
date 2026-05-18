



<?php $__env->startSection('title', 'Tableau de bord'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-4">

    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Produits</h6>
                <h2><?php echo e($totalProduits); ?></h2>
                <a href="<?php echo e(route('admin.produits.index')); ?>" class="btn btn-sm btn-primary mt-2">
                    Gérer les produits
                </a>
            </div>
        </div>
    </div>

    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Commandes</h6>
                <h2><?php echo e($totalCommandes); ?></h2>
                <a href="<?php echo e(route('admin.commandes.index')); ?>" class="btn btn-sm btn-warning mt-2">
                    Voir les commandes
                </a>
            </div>
        </div>
    </div>

    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Clients</h6>
                <h2><?php echo e($totalClients); ?></h2>
                <a href="<?php echo e(route('admin.clients.index')); ?>" class="btn btn-sm btn-success mt-2">
                    Voir les clients
                </a>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>