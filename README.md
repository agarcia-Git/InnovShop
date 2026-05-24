# InnovShop 🛒

Plateforme e-commerce spécialisée dans la vente de produits technologiques.

---

## Stack technique

- **Framework** : Laravel 13
- **Langage** : PHP 8.3
- **Base de données** : MySQL 8.4
- **Front-end** : Blade, Bootstrap 5
- **Serveur local** : WAMP

---


## Installation

**Cloner le dépôt**
```bash
git clone https://github.com/agarcia-Git/InnovShop.git
cd innovshop
```

Ouvrez le fichier `.env` et configurez votre connexion à la base de données :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=innovshop
DB_USERNAME=root
DB_PASSWORD=
```

**Créer la base de données et la peupler**
```bash
php artisan migrate:fresh --seed
```

**Lancer le serveur**
```bash
php artisan serve
```

L'application est accessible à l'adresse `http://localhost:8000`.

---

## Comptes de test

| Rôle          | Email                      | Mot de passe |
|---------------|----------------------------|--------------|
| Administrateur | admin@innovshop.com        | password     |
| Client         | jean.dupont@gmail.com      | password     |

---

## Fonctionnalités

**Espace client**
- Inscription et connexion
- Catalogue de produits avec page détail
- Gestion du panier
- Passage de commande
- Historique des commandes dans l'espace client

**Back-office administrateur**
- Tableau de bord avec statistiques
- CRUD complet sur les produits (avec upload d'image)
- Consultation et mise à jour du statut des commandes
- Consultation des clients et de leur historique
- Accès sécurisé via middleware et Policies Laravel

---

## Bonnes pratiques Laravel appliquées

- Architecture **MVC** stricte avec séparation front-office / back-office
- **Eloquent ORM** pour toutes les interactions avec la base de données
- **Migrations** et **Seeders** pour la gestion reproductible de la base
- **Policies** Laravel pour la gestion fine des autorisations
- **Middleware** personnalisé pour la protection du back-office
- **Route Model Binding** pour la résolution automatique des modèles
- **Form Requests** et validation côté serveur sur tous les formulaires
- **Factories** pour la génération de données de test réalistes

---

