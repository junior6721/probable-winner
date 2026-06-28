# Stock Manager - Configuration

## 📋 Checklist d'Installation

- [ ] Cloner le repository
- [ ] Installer Composer: `composer install`
- [ ] Installer NPM: `npm install`
- [ ] Copier .env: `cp .env.example .env`
- [ ] Générer clé: `php artisan key:generate`
- [ ] Configurer la base de données dans .env
- [ ] Exécuter migrations: `php artisan migrate`
- [ ] Compiler assets: `npm run build`
- [ ] Démarrer le serveur: `php artisan serve`

## 🔧 Configuration Rapide

### Database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stock_manager
DB_USERNAME=root
DB_PASSWORD=
```

### App

```env
APP_NAME=Stock Manager
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
```

## 📊 Données de Test

Pour ajouter des données de test, créez des seeders :

```bash
php artisan make:seeder CategorySeeder
php artisan make:seeder ProductSeeder
php artisan make:seeder RoleSeeder
```

Puis exécutez :

```bash
php artisan db:seed
```

## 🔐 Sécurité

- Changez la clé APP_KEY en production
- Utilisez des mots de passe forts pour MySQL
- Configurez HTTPS en production
- Mettez à jour régulièrement les dépendances

## 📱 Fonctionnalités Futures

- [ ] Export PDF des rapports
- [ ] Graphiques avancés
- [ ] API REST
- [ ] Mobile app
- [ ] Notifications email
- [ ] Code-barres
- [ ] Multi-langue
- [ ] Multi-devise

## 🔗 Ressources Utiles

- [Laravel Docs](https://laravel.com/docs)
- [Tailwind Docs](https://tailwindcss.com)
- [MySQL Docs](https://dev.mysql.com/doc/)
- [GitHub Issues](https://github.com/junior6721/probable-winner/issues)

## 📞 Support

Pour toute question ou problème :

1. Consultez le README
2. Vérifiez les issues GitHub
3. Créez une nouvelle issue avec détails

---

**Développé par** : junior6721
**Dernière mise à jour** : 28 Juin 2026