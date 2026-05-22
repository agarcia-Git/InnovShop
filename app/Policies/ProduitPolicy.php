<?php

namespace App\Policies;

use App\Models\Produit;
use App\Models\User;

class ProduitPolicy
{
    /**
     * Les admins peuvent tout faire sur les produits.
     * On centralise la règle ici plutôt que de la répéter dans chaque méthode.
     */
    public function before(User $user, string $ability): bool|null
    {
        // Si l'utilisateur est admin, on court-circuite toutes les vérifications
        // et on autorise immédiatement l'action, quelle qu'elle soit
        if ($user->isAdmin()) {
            return true;
        }

        // Si ce n'est pas un admin, on laisse chaque méthode décider individuellement
        return null;
    }

    // Un client peut voir la liste des produits (page catalogue)
    public function viewAny(User $user): bool
    {
        return true;
    }

    // Un client peut voir un produit spécifique (page détail)
    public function view(User $user, Produit $produit): bool
    {
        return true;
    }

    // Seul un admin peut créer (géré par before())
    public function create(User $user): bool
    {
        return false;
    }

    // Seul un admin peut modifier (géré par before())
    public function update(User $user, Produit $produit): bool
    {
        return false;
    }

    // Seul un admin peut supprimer (géré par before())
    public function delete(User $user, Produit $produit): bool
    {
        return false;
    }

    public function restore(User $user, Produit $produit): bool
    {
        return false;
    }

    public function forceDelete(User $user, Produit $produit): bool
    {
        return false;
    }
}