# 📦 Stock Manager - Système de Gestion de Stocks

Un système complet de gestion de stocks construit avec **Laravel 12**, **Blade + Tailwind CSS**, **MySQL**, et **Laravel Breeze**.

## ✨ Fonctionnalités Principales

✅ **Gestion des Produits**
- CRUD complet (Créer, Lire, Mettre à jour, Supprimer)
- Organisation par catégories
- Gestion des prix et des unités

✅ **Gestion des Stocks**
- Suivi des quantités en temps réel
- Définition des quantités minimales
- Alertes de stock faible

✅ **Mouvements de Stock**
- Enregistrement des entrées (achats)
- Enregistrement des sorties (ventes)
- Ajustements d'inventaire
- Historique complet

✅ **Utilisateurs et Rôles**
- Authentification sécurisée (Laravel Breeze)
- Rôles: Admin, Employé
- Gestion des permissions

✅ **Rapports et Statistiques**
- Rapport d'inventaire détaillé
- Rapport des mouvements avec filtres
- Statistiques en temps réel
- Valeur totale du stock

✅ **Tableau de Bord**
- Vue d'ensemble des métriques clés
- Alertes de stock faible
- Derniers mouvements
- Actions rapides

## 🛠️ Stack Technique

| Composant | Technologie |
|-----------|-------------|
| **Backend** | Laravel 12 |
| **Frontend** | Blade Templates + Tailwind CSS |
| **Database** | MySQL |
| **Auth** | Laravel Breeze |
| **Package Manager** | Composer, NPM |

## 📋 Prérequis

- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL 8.0+
- Git

## 🚀 Installation

### 1. Cloner le repository
```bash
git clone https://github.com/junior6721/probable-winner.git
cd probable-winner
```

### 2. Installer les dépendances PHP
```bash
composer install
```

### 3. Installer les dépendances JavaScript
```bash
npm install
```

### 4. Copier le fichier d'environnement
```bash
cp .env.example .env
```

### 5. Générer la clé d'application
```bash
php artisan key:generate
```

### 6. Configurer la base de données

Mettez à jour les variables d'environnement dans `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stock_manager
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Exécuter les migrations
```bash
php artisan migrate
```

### 8. Compiler les assets frontend
```bash
npm run build
```

### 9. Démarrer le serveur
```bash
php artisan serve
```

L'application est maintenant disponible à : **http://localhost:8000**

## 📁 Structure du Projet

```
stock-manager/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php
│   │   │   ├── ProductController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── StockMovementController.php
│   │   │   └── ReportController.php
│   │   └── Middleware/
│   └── Models/
│       ├── Product.php
│       ├── Category.php
│       ├── StockMovement.php
│       ├── Role.php
│       └── User.php
├── database/
│   └── migrations/
│       ├── 2024_01_01_000000_create_categories_table.php
│       ├── 2024_01_01_000001_create_products_table.php
│       ├── 2024_01_01_000002_create_stock_movements_table.php
│       ├── 2024_01_01_000003_create_roles_table.php
│       └── 2024_01_02_000000_add_role_to_users_table.php
├── resources/
│   └── views/
│       ├── dashboard.blade.php
│       ├── products/
│       ├── categories/
│       ├── movements/
│       └── reports/
├── routes/
│   └── web.php
└── ...
```

## 📊 Modèles de Données

### Product
- `id` - ID unique
- `code` - Code produit unique
- `name` - Nom du produit
- `description` - Description
- `category_id` - ID de la catégorie
- `price` - Prix unitaire
- `quantity` - Quantité en stock
- `min_quantity` - Quantité minimale (seuil d'alerte)
- `unit` - Unité de mesure
- `timestamps`

### Category
- `id` - ID unique
- `name` - Nom de la catégorie
- `description` - Description
- `timestamps`

### StockMovement
- `id` - ID unique
- `product_id` - ID du produit
- `user_id` - ID de l'utilisateur
- `type` - Type (in, out, adjustment)
- `quantity` - Quantité du mouvement
- `reason` - Raison du mouvement
- `notes` - Notes supplémentaires
- `timestamps`

### Role
- `id` - ID unique
- `name` - Nom du rôle
- `description` - Description
- `timestamps`

## 🔐 Authentification

Le système utilise **Laravel Breeze** pour l'authentification :

- **Inscription** : Les nouveaux utilisateurs peuvent s'inscrire
- **Connexion** : Authentification sécurisée
- **Mot de passe oublié** : Reset de mot de passe par email
- **Rôles** : Assignment de rôles (Admin/Employé)

## 📊 Pages Principales

### Dashboard
- Vue d'ensemble des métriques
- Produits en stock faible
- Derniers mouvements
- Actions rapides

### Produits
- Liste de tous les produits
- Création/Édition de produits
- Détails du produit avec historique
- Suppression de produits

### Catégories
- Gestion des catégories
- CRUD complet

### Mouvements de Stock
- Enregistrement des entrées/sorties
- Historique complet
- Filtrage par date et type

### Rapports
- **Inventaire** : Liste complète avec valeurs
- **Mouvements** : Filtres avancés
- **Statistiques** : Métriques clés

## 🎨 Personnalisation

### Ajouter une nouvelle fonctionnalité

1. **Créer le contrôleur**
```bash
php artisan make:controller NouveauController
```

2. **Créer le modèle**
```bash
php artisan make:model NouveauModel -m
```

3. **Créer la migration**
```bash
php artisan make:migration create_nouveaus_table
```

4. **Ajouter les routes** dans `routes/web.php`

5. **Créer les vues** dans `resources/views/`

## 📝 Commandes Utiles

```bash
# Migrations
php artisan migrate              # Exécuter les migrations
php artisan migrate:rollback     # Annuler les migrations
php artisan migrate:refresh      # Réinitialiser les migrations

# Seeders
php artisan db:seed             # Exécuter les seeders
php artisan make:seeder CategorySeeder

# Cache
php artisan cache:clear         # Vider le cache
php artisan config:cache        # Cacher la config

# Assets
npm run dev                      # Build en développement
npm run build                    # Build en production
```

## 🐛 Dépannage

### Erreur de connexion à la base de données

Vérifiez :
- Les paramètres MySQL dans `.env`
- Que MySQL est en cours d'exécution
- Les droits d'accès de l'utilisateur

### Erreur 500

Consultez les logs :
```bash
tail -f storage/logs/laravel.log
```

### Assets non mis à jour

Recompiler :
```bash
npm run build
php artisan cache:clear
```

## 🚀 Déploiement

### Sur un serveur web

1. Cloner le repository
2. Installer les dépendances
3. Configurer `.env` pour la production
4. Exécuter les migrations
5. Compiler les assets
6. Configurer le web server (Apache/Nginx)
7. Définir les permissions (storage, bootstrap/cache)

### Variables d'environnement production

```env
APP_ENV=production
APP_DEBUG=false
DB_PASSWORD=secure_password
MAIL_MAILER=smtp
```

## 📚 Documentation

- [Documentation Laravel](https://laravel.com/docs)
- [Documentation Tailwind CSS](https://tailwindcss.com/docs)
- [Documentation MySQL](https://dev.mysql.com/doc/)

## 🤝 Contribution

Les contributions sont bienvenues ! N'hésitez pas à :

1. Fork le projet
2. Créer une branche (`git checkout -b feature/AmazingFeature`)
3. Commit les changements (`git commit -m 'Add some AmazingFeature'`)
4. Push la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 📧 Contact

- **Développeur** : junior6721
- **Email** : jujusessi@gmail.com
- **GitHub** : [@junior6721](https://github.com/junior6721)

---

**Dernière mise à jour** : 28 Juin 2026

⭐ Si vous trouvez ce projet utile, n'oubliez pas de lui donner une ⭐ sur GitHub !