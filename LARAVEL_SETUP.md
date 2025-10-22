# 🚀 Guide de Configuration Laravel - CyberUI

Ce guide vous aide à lancer la **version Laravel complète** du template CyberUI.

## ✅ Prérequis

- ✓ PHP 8.1 ou supérieur
- ✓ Composer installé
- ✓ Extension PHP fileinfo activée (voir TROUBLESHOOTING.md si besoin)

## 📋 Étapes d'installation

### Étape 1 : Installer les dépendances Composer

Dans votre terminal Windows, dans le dossier CyberUI, exécutez :

```bash
composer install
```

Si tout fonctionne, vous devriez voir le dossier `vendor/` créé avec toutes les dépendances Laravel.

### Étape 2 : Vérifier le fichier .env

Le fichier `.env` devrait déjà exister. Vérifiez qu'il contient :

```env
APP_NAME=CyberUI
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
```

### Étape 3 : Générer la clé d'application

Cette clé est essentielle pour le chiffrement. Exécutez :

```bash
php artisan key:generate
```

Vous devriez voir : **Application key set successfully.**

### Étape 4 : Vérifier l'installation

Testez que Laravel fonctionne :

```bash
php artisan --version
```

Vous devriez voir : **Laravel Framework 10.x.x**

### Étape 5 : Lancer le serveur de développement

```bash
php artisan serve
```

Vous devriez voir :

```
INFO  Server running on [http://127.0.0.1:8000].

Press Ctrl+C to stop the server
```

### Étape 6 : Ouvrir dans le navigateur

Ouvrez votre navigateur et allez à :

```
http://localhost:8000
```

ou

```
http://127.0.0.1:8000
```

## 🎉 Succès !

Si tout fonctionne, vous devriez voir la page d'accueil CyberUI avec :
- Le carousel animé
- La section des articles récents avec défilement horizontal
- La section des alertes avec défilement horizontal
- Les cartes d'actions rapides

## 📄 Pages disponibles

- **Accueil** : http://localhost:8000/
- **Alertes** : http://localhost:8000/alertes
- **Rapports** : http://localhost:8000/rapports
- **Bulletins** : http://localhost:8000/bulletins
- **Documentation** : http://localhost:8000/documentation
- **Contact** : http://localhost:8000/contact
- **Déclarer un incident** : http://localhost:8000/declarer-incident

## 🛠️ Commandes utiles

### Arrêter le serveur
Appuyez sur `Ctrl+C` dans le terminal

### Relancer le serveur
```bash
php artisan serve
```

### Utiliser un port différent
```bash
php artisan serve --port=3000
```

### Vider le cache (si besoin)
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## ❗ Problèmes courants

### Erreur : "No application encryption key has been specified"
**Solution** : Exécutez `php artisan key:generate`

### Erreur : "Class 'App\Http\Controllers\Controller' not found"
**Solution** : Le fichier est manquant. Créez-le (voir ci-dessous)

### Erreur : "View [pages.home] not found"
**Solution** : Vérifiez que les fichiers dans `resources/views/` existent

### Le serveur ne démarre pas
**Solution** :
1. Vérifiez que le port 8000 n'est pas déjà utilisé
2. Essayez un autre port : `php artisan serve --port=3000`
3. Vérifiez que PHP est bien installé : `php -v`

## 🔧 Fichier Controller de base

Si vous avez une erreur sur le Controller de base, créez le fichier :

`app/Http/Controllers/Controller.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
```

## 📝 Structure des fichiers

```
CyberUI/
├── app/
│   └── Http/
│       └── Controllers/        # Tous vos contrôleurs
├── bootstrap/
│   └── app.php                 # Configuration de l'app
├── config/
│   └── app.php                 # Configuration principale
├── public/
│   ├── css/
│   │   └── style.css          # Tous les styles
│   ├── js/
│   │   └── main.js            # Tous les scripts
│   └── index.php              # Point d'entrée
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php  # Layout principal
│       └── pages/             # Toutes les pages
├── routes/
│   └── web.php                # Routes de l'application
├── storage/                   # Fichiers de cache et logs
├── vendor/                    # Dépendances Composer
├── .env                       # Configuration environnement
├── artisan                    # CLI Laravel
└── composer.json              # Dépendances du projet
```

## 🎨 Personnalisation

### Modifier les styles
Éditez : `public/css/style.css`

### Modifier les scripts
Éditez : `public/js/main.js`

### Modifier les données d'exemple
Éditez les contrôleurs dans : `app/Http/Controllers/`

### Ajouter une nouvelle page
1. Créez une route dans `routes/web.php`
2. Créez un contrôleur dans `app/Http/Controllers/`
3. Créez une vue dans `resources/views/pages/`

## 🚀 Prochaines étapes

1. **Base de données** : Configurez une base de données dans `.env`
2. **Migrations** : Créez les tables avec `php artisan migrate`
3. **Authentification** : Ajoutez un système de login
4. **API** : Créez des endpoints pour les données dynamiques
5. **Déploiement** : Préparez l'application pour la production

## 📞 Besoin d'aide ?

- Consultez TROUBLESHOOTING.md pour les problèmes courants
- Documentation Laravel : https://laravel.com/docs
- README.md pour la documentation complète du template

---

**Bon développement avec CyberUI ! 🛡️**
