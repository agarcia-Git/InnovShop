<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Accueil <?php $__env->endSlot(); ?>

    <h2 class="mb-4">🆕 Derniers produits</h2>
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $derniersProduits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?php echo e($produit->image ?? 'https://placehold.co/300x200'); ?>"
                         class="card-img-top" alt="<?php echo e($produit->name); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($produit->name); ?></h5>
                        <p class="text-success fw-bold"><?php echo e(number_format($produit->price, 2)); ?> €</p>
                        <a href="<?php echo e(route('produit.show', $produit->id)); ?>" class="btn btn-primary btn-sm">Voir le produit</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-muted">Aucun produit disponible pour le moment.</p>
        <?php endif; ?>
    </div>

    <hr class="my-5">

    <h2 class="mb-4">⭐ Produits à la une</h2>
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $produitsUne; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-warning">
                    <img src="<?php echo e($produit->image ?? 'https://placehold.co/300x200'); ?>"
                         class="card-img-top" alt="<?php echo e($produit->name); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($produit->name); ?></h5>
                        <p class="text-success fw-bold"><?php echo e(number_format($produit->price, 2)); ?> €</p>
                        <a href="<?php echo e(route('produit.show', $produit->id)); ?>" class="btn btn-warning btn-sm">Voir le produit</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-muted">Aucun produit à la une pour le moment.</p>
        <?php endif; ?>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/accueil.blade.php ENDPATH**/ ?>