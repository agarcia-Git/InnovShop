

<?php $__env->startSection('title', 'Gestion des commandes'); ?>

<?php $__env->startSection('content'); ?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($commande->id); ?></td>
                    <td><?php echo e($commande->user->first_name); ?> <?php echo e($commande->user->last_name); ?></td>
                    <td><?php echo e(number_format($commande->total_price, 2)); ?> €</td>
                    <td>
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
                        <span class="badge bg-<?php echo e($badges[$commande->status] ?? 'secondary'); ?>">
                            <?php echo e($labels[$commande->status] ?? $commande->status); ?>

                        </span>
                    </td>
                    <td><?php echo e($commande->created_at->format('d/m/Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.commandes.show', $commande)); ?>"
                           class="btn btn-sm btn-primary">Voir</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Aucune commande.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    <?php echo e($commandes->links('vendor.pagination.bootstrap-5')); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/admin/commandes/index.blade.php ENDPATH**/ ?>