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
     <?php $__env->slot('title', null, []); ?> Mon compte <?php $__env->endSlot(); ?>

    <h2 class="mb-4">👤 Mon espace client</h2>

    
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-primary">
                <div class="card-body">
                    <h3 class="text-primary fw-bold"><?php echo e($nombreCommandes); ?></h3>
                    <p class="text-muted mb-0">Commande(s) passée(s)</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-success">
                <div class="card-body">
                    <h3 class="text-success fw-bold"><?php echo e(number_format($totalDepense, 2)); ?> €</h3>
                    <p class="text-muted mb-0">Total dépensé</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-info">
                <div class="card-body">
                    <h3 class="text-info fw-bold"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></h3>
                    <p class="text-muted mb-0"><?php echo e(Auth::user()->email); ?></p>
                </div>
            </div>
        </div>
    </div>

    
    <h4 class="mb-3">📦 Historique des commandes</h4>

    <?php if($commandes->count() > 0): ?>
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>N° commande</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $statuts = [
                        'pending'   => ['label' => 'En attente',  'badge' => 'bg-warning text-dark'],
                        'confirmed' => ['label' => 'Confirmée',   'badge' => 'bg-success'],
                        'shipped'   => ['label' => 'Expédiée',    'badge' => 'bg-info'],
                        'delivered' => ['label' => 'Livrée',      'badge' => 'bg-primary'],
                        'cancelled' => ['label' => 'Annulée',     'badge' => 'bg-danger'],
                    ];
                ?>

                <?php $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><strong>#<?php echo e($commande->id); ?></strong></td>
                        <td><?php echo e($commande->created_at->format('d/m/Y à H:i')); ?></td>
                        <td>
                            <?php $statut = $statuts[$commande->status] ?? ['label' => $commande->status, 'badge' => 'bg-secondary']; ?>
                            <span class="badge <?php echo e($statut['badge']); ?>"><?php echo e($statut['label']); ?></span>
                        </td>
                        <td><?php echo e(number_format($commande->total_price, 2)); ?> €</td>
                        <td>
                            <a href="<?php echo e(route('client.commande', $commande->id)); ?>"
                               class="btn btn-outline-primary btn-sm">
                                Voir le détail
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">
            Vous n'avez pas encore passé de commande.
            <a href="<?php echo e(route('catalogue')); ?>">Découvrir nos produits</a>
        </div>
    <?php endif; ?>

    
<h4 class="mb-3 mt-5">💰 Suivi de mes dépenses</h4>

<div class="row mb-4">

    
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted">Dépenses ce mois-ci</h6>
                <h4 class="fw-bold text-danger"><?php echo e(number_format($depensesMoisActuel, 2)); ?> €</h4>

                
                <p class="text-muted small mb-1">
                    Objectif mensuel : <?php echo e(number_format($objectifMensuel, 2)); ?> €
                </p>
                <div class="progress" style="height: 12px;">
                    <div class="progress-bar <?php echo e($pourcentageBudget >= 100 ? 'bg-danger' : ($pourcentageBudget >= 75 ? 'bg-warning' : 'bg-success')); ?>"
                         role="progressbar"
                         style="width: <?php echo e($pourcentageBudget); ?>%"
                         aria-valuenow="<?php echo e($pourcentageBudget); ?>"
                         aria-valuemin="0"
                         aria-valuemax="100">
                    </div>
                </div>
                <p class="text-muted small mt-1">
                    <?php echo e(number_format($pourcentageBudget, 0)); ?>% de votre budget mensuel utilisé
                    <?php if($pourcentageBudget >= 100): ?>
                        <span class="text-danger fw-bold">— Budget dépassé !</span>
                    <?php elseif($pourcentageBudget >= 75): ?>
                        <span class="text-warning fw-bold">— Attention, budget presque atteint</span>
                    <?php else: ?>
                        <span class="text-success">— Budget maîtrisé ✅</span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>

    
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted">Dépenses ces 3 derniers mois</h6>
                <h4 class="fw-bold text-warning"><?php echo e(number_format($depensesTrimestre, 2)); ?> €</h4>
                <p class="text-muted small">
                    Soit une moyenne de
                    <strong><?php echo e(number_format($depensesTrimestre / 3, 2)); ?> € / mois</strong>
                    sur le trimestre.
                </p>

                <h6 class="text-muted mt-3">Total dépensé depuis le début</h6>
                <h4 class="fw-bold text-primary"><?php echo e(number_format($totalDepense, 2)); ?> €</h4>
                <p class="text-muted small">
                    Sur <?php echo e($nombreCommandes); ?> commande(s) passée(s).
                </p>
            </div>
        </div>
    </div>

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
<?php endif; ?><?php /**PATH C:\wamp64\www\InnovShop\resources\views/espace-client/index.blade.php ENDPATH**/ ?>