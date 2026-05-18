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
     <?php $__env->slot('title', null, []); ?> Commande #<?php echo e($commande->id); ?> <?php $__env->endSlot(); ?>

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('client.index')); ?>">Mon compte</a></li>
            <li class="breadcrumb-item active">Commande #<?php echo e($commande->id); ?></li>
        </ol>
    </nav>

    <h2 class="mb-4">📦 Commande n°<?php echo e($commande->id); ?></h2>

    
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Informations générales</strong>
        </div>
        <div class="card-body">
            <p class="mb-1">
                <strong>Date :</strong> <?php echo e($commande->created_at->format('d/m/Y à H:i')); ?>

            </p>
            <p class="mb-0">
                <strong>Statut :</strong>
                <?php
                    $statuts = [
                        'pending'   => ['label' => 'En attente',  'badge' => 'bg-warning text-dark'],
                        'confirmed' => ['label' => 'Confirmée',   'badge' => 'bg-success'],
                        'shipped'   => ['label' => 'Expédiée',    'badge' => 'bg-info'],
                        'delivered' => ['label' => 'Livrée',      'badge' => 'bg-primary'],
                        'cancelled' => ['label' => 'Annulée',     'badge' => 'bg-danger'],
                    ];
                    $statut = $statuts[$commande->status] ?? ['label' => $commande->status, 'badge' => 'bg-secondary'];
                ?>
                <span class="badge <?php echo e($statut['badge']); ?>"><?php echo e($statut['label']); ?></span>
            </p>
        </div>
    </div>

    
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Produits commandés</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Produit</th>
                        <th>Option</th>
                        <th>Prix unitaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $commande->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ligne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($ligne['name']); ?></td>
                            <td><?php echo e($ligne['option'] ?? '—'); ?></td>
                            <td><?php echo e(number_format($ligne['price'], 2)); ?> €</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr class="table-success">
                        <td colspan="2"><strong>Total</strong></td>
                        <td><strong><?php echo e(number_format($commande->total_price, 2)); ?> €</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Adresse de livraison</strong>
        </div>
        <div class="card-body">
            <p class="mb-1"><?php echo e($commande->shipping_address); ?></p>
            <p class="mb-1"><?php echo e($commande->shipping_postal_code); ?> <?php echo e($commande->shipping_city); ?></p>
            <p class="mb-0"><?php echo e($commande->shipping_country); ?></p>
        </div>
    </div>

    <a href="<?php echo e(route('client.index')); ?>" class="btn btn-outline-secondary">
        ← Retour à mon compte
    </a>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/espace-client/show.blade.php ENDPATH**/ ?>