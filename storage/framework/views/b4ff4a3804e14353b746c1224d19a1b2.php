

<?php $__env->startSection('title', 'Client : ' . $client->first_name . ' ' . $client->last_name); ?>

<?php $__env->startSection('content'); ?>

<div class="row g-4">

    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-3">Informations</h5>
                <p><strong>Prénom :</strong> <?php echo e($client->first_name); ?></p>
                <p><strong>Nom :</strong> <?php echo e($client->last_name); ?></p>
                <p><strong>Email :</strong> <?php echo e($client->email); ?></p>
                <p><strong>Adresse :</strong> <?php echo e($client->address ?? '—'); ?></p>
                <p><strong>Inscrit le :</strong> <?php echo e($client->created_at->format('d/m/Y')); ?></p>
            </div>
        </div>
    </div>

    
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-3">
                    Historique des commandes
                    <span class="badge bg-secondary ms-2"><?php echo e($commandes->count()); ?></span>
                </h5>

                <?php if($commandes->isEmpty()): ?>
                    <p class="text-muted">Ce client n'a pas encore passé de commande.</p>
                <?php else: ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $badges = [
                                    'pending'   => 'secondary',
                                    'confirmed' => 'primary',
                                    'shipped'   => 'info',
                                    'delivered' => 'success',
                                    'cancelled' => 'danger',
                                ];
                                $labels = [
                                    'pending'   => 'En attente',
                                    'confirmed' => 'Confirmée',
                                    'shipped'   => 'Expédiée',
                                    'delivered' => 'Livrée',
                                    'cancelled' => 'Annulée',
                                ];
                            ?>
                            <?php $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($commande->id); ?></td>
                                <td><?php echo e(number_format($commande->total_price, 2)); ?> €</td>
                                <td>
                                    <span class="badge bg-<?php echo e($badges[$commande->status] ?? 'secondary'); ?>">
                                        <?php echo e($labels[$commande->status] ?? $commande->status); ?>

                                    </span>
                                </td>
                                <td><?php echo e($commande->created_at->format('d/m/Y')); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.commandes.show', $commande)); ?>"
                                       class="btn btn-sm btn-outline-primary">Voir</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<div class="mt-3">
    <a href="<?php echo e(route('admin.clients.index')); ?>" class="btn btn-secondary">
        &larr; Retour aux clients
    </a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/admin/clients/show.blade.php ENDPATH**/ ?>