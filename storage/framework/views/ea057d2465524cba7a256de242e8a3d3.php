

<?php $__env->startSection('title', 'Modifier un produit'); ?>

<?php $__env->startSection('content'); ?>

<div class="card border-0 shadow-sm" style="max-width: 700px;">
    <div class="card-body">
        <form action="<?php echo e(route('admin.produits.update', $produit)); ?>" method="POST"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label class="form-label">Nom du produit</label>
                <input type="text" name="name"
                       class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       value="<?php echo e(old('name', $produit->name)); ?>">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4"
                          class="form-control"><?php echo e(old('description', $produit->description)); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Spécifications</label>
                <textarea name="specifications" rows="3"
                          class="form-control"><?php echo e(old('specifications', $produit->specifications)); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Prix (€)</label>
                <input type="number" name="price" step="0.01" min="0"
                       class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       value="<?php echo e(old('price', $produit->price)); ?>">
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Image actuelle</label><br>
                <?php if($produit->image): ?>
                    <img src="<?php echo e(asset('storage/' . $produit->image)); ?>"
                         height="80" class="mb-2 rounded">
                <?php else: ?>
                    <span class="text-muted">Aucune image</span>
                <?php endif; ?>
                <input type="file" name="image" class="form-control mt-2" accept="image/*">
                <small class="text-muted">Laissez vide pour conserver l'image actuelle.</small>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="availability" value="1"
                           class="form-check-input" id="availability"
                           <?php echo e(old('availability', $produit->availability) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="availability">Disponible à la vente</label>
                </div>
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input type="checkbox" name="is_featured" value="1"
                           class="form-check-input" id="is_featured"
                           <?php echo e(old('is_featured', $produit->is_featured) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="is_featured">Produit mis en avant</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="<?php echo e(route('admin.produits.index')); ?>" class="btn btn-secondary">Annuler</a>
            </div>

        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/admin/produits/edit.blade.php ENDPATH**/ ?>