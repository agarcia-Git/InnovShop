<?php

namespace App\Policies;

use App\Models\Commande;
use App\Models\User;

class CommandePolicy
{
    /**
     * Comme pour ProduitPolicy, les admins ont accès à tout.
     * La méthode before() court-circuite toutes les vérifications pour eux.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null;
    }

    /**
     * Un client peut voir la liste de SES commandes (espace client).
     * Un admin peut voir toutes les commandes (géré par before()).
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * C'est ici que la règle est la plus fine :
     * un client ne peut voir une commande que si elle lui appartient.
     * On compare simplement l'id de l'utilisateur connecté
     * avec le user_id stocké dans la commande.
     */
    public function view(User $user, Commande $commande): bool
    {
        return $user->id === $commande->user_id;
    }

    /**
     * Les commandes sont créées par le processus de paiement, pas manuellement.
     * Ni les clients ni les admins non-système ne peuvent en créer via l'interface.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Seul un admin peut modifier le statut d'une commande (géré par before()).
     * Un client ne peut pas modifier ses commandes.
     */
    public function update(User $user, Commande $commande): bool
    {
        return false;
    }

    // Les commandes ne se suppriment pas — elles sont archivées
    public function delete(User $user, Commande $commande): bool
    {
        return false;
    }

    public function restore(User $user, Commande $commande): bool
    {
        return false;
    }

    public function forceDelete(User $user, Commande $commande): bool
    {
        return false;
    }
}