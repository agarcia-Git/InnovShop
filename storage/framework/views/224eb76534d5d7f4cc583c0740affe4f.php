

<?php $__env->startSection('title', 'Gestion des produits'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <a href="<?php echo e(route('admin.produits.create')); ?>" class="btn btn-primary">
        + Ajouter un produit
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Disponibilité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php if($produit->image): ?>
                            <img src="<?php echo e(asset('storage/' . $produit->image)); ?>"
                                 width="50" height="50"
                                 style="object-fit:cover; border-radius:4px;">
                        <?php else: ?>
                            <span class="text-muted">—</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($produit->name); ?></td>
                    <td><?php echo e(number_format($produit->price, 2)); ?> €</td>
                    <td>
                        <?php if($produit->availability): ?>
                            <span class="badge bg-success">Disponible</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Indisponible</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.produits.edit', $produit)); ?>"
                           class="btn btn-sm btn-warning">Modifier</a>
                        <form action="<?php echo e(route('admin.produits.destroy', $produit)); ?>"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Supprimer ce produit ?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Aucun produit pour le moment.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    <?php echo e($produits->links('vendor.pagination.bootstrap-5')); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/admin/produits/index.blade.php ENDPATH**/ ?>