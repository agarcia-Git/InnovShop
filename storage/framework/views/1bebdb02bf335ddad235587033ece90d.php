

<?php $__env->startSection('title', 'Commande #' . $commande->id); ?>

<?php $__env->startSection('content'); ?>

<div class="row g-4">

    
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title mb-3">Informations client</h5>
                <p><strong>Nom :</strong> <?php echo e($commande->user->first_name); ?> <?php echo e($commande->user->last_name); ?></p>
                <p><strong>Email :</strong> <?php echo e($commande->user->email); ?></p>
                <hr>
                <h5 class="mb-3">Adresse de livraison</h5>
                <p>
                    <?php echo e($commande->shipping_address); ?><br>
                    <?php echo e($commande->shipping_postal_code); ?> <?php echo e($commande->shipping_city); ?><br>
                    <?php echo e($commande->shipping_country); ?>

                </p>
            </div>
        </div>
    </div>

    
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title mb-3">Statut de la commande</h5>
                <form action="<?php echo e(route('admin.commandes.update', $commande)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="mb-3">
                        <select name="status" class="form-select">
                            <?php $__currentLoopData = ['pending' => 'En attente', 'confirmed' => 'Confirmée', 'shipped' => 'Expédiée', 'delivered' => 'Livrée', 'cancelled' => 'Annulée']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>"
                                    <?php echo e($commande->status === $value ? 'selected' : ''); ?>>
                                    <?php echo e($label); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-3">Produits commandés</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Sous-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__currentLoopData = $commande->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($produit['name'] ?? 'Produit inconnu'); ?></td>
                            <td><?php echo e($produit['quantity'] ?? 1); ?></td>
                            <td><?php echo e(number_format($produit['price'] ?? 0, 2)); ?> €</td>
                            <td><?php echo e(number_format(($produit['price'] ?? 0) * ($produit['quantity'] ?? 1), 2)); ?> €</td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Total :</td>
                            <td class="fw-bold"><?php echo e(number_format($commande->total_price, 2)); ?> €</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="mt-3">
    <a href="<?php echo e(route('admin.commandes.index')); ?>" class="btn btn-secondary">
        &larr; Retour aux commandes
    </a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/admin/commandes/show.blade.php ENDPATH**/ ?>