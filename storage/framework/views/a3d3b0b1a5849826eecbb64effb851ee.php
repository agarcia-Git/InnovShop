

<?php $__env->startSection('title', 'Gestion des clients'); ?>

<?php $__env->startSection('content'); ?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Inscrit le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($client->first_name); ?> <?php echo e($client->last_name); ?></td>
                    <td><?php echo e($client->email); ?></td>
                    <td><?php echo e($client->address ?? '—'); ?></td>
                    <td><?php echo e($client->created_at->format('d/m/Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.clients.show', $client)); ?>"
                           class="btn btn-sm btn-primary">Voir</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Aucun client.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    <?php echo e($clients->links('vendor.pagination.bootstrap-5')); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/admin/clients/index.blade.php ENDPATH**/ ?>