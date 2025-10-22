# 🚀 Installation Rapide - CyberUI

Ce guide vous permet de tester le template **IMMÉDIATEMENT** sans installer Laravel ni Composer !

## 🎯 Version Standalone (Sans Laravel)

### Prérequis
- PHP 7.4 ou supérieur
- Un serveur web (Apache, Nginx, ou PHP built-in server)

### Installation en 3 étapes

#### Étape 1 : Télécharger le projet
Le projet est déjà sur votre machine dans le dossier `CyberUI`.

#### Étape 2 : Lancer le serveur PHP
Ouvrez un terminal dans le dossier `CyberUI` et exécutez :

```bash
php -S localhost:8000 standalone.php
```

#### Étape 3 : Ouvrir dans le navigateur
Ouvrez votre navigateur et allez à :
```
http://localhost:8000
```

**C'est tout ! 🎉** Le site est maintenant accessible !

## 📄 Pages disponibles

- **Accueil** : `http://localhost:8000?page=home`
- **Alertes** : `http://localhost:8000?page=alertes`
- **Rapports** : `http://localhost:8000?page=rapports`
- **Bulletins** : `http://localhost:8000?page=bulletins`
- **Documentation** : `http://localhost:8000?page=documentation`
- **Contact** : `http://localhost:8000?page=contact`
- **Déclarer un incident** : `http://localhost:8000?page=incident-form`

## 🔧 Si vous voulez utiliser la version Laravel complète

### Résoudre le problème de l'extension fileinfo

1. **Localisez votre fichier php.ini** :
   ```
   C:\Program Files\php-8.4.13\php.ini
   ```

2. **Ouvrez-le avec un éditeur de texte** (en tant qu'administrateur)

3. **Recherchez cette ligne** :
   ```
   ;extension=fileinfo
   ```

4. **Enlevez le point-virgule** pour activer l'extension :
   ```
   extension=fileinfo
   ```

5. **Sauvegardez** et fermez le fichier

6. **Vérifiez que l'extension est activée** :
   ```bash
   php -m | grep fileinfo
   ```
   Vous devriez voir "fileinfo" dans la liste.

7. **Installez Laravel** :
   ```bash
   composer install
   ```

8. **Lancez le serveur Laravel** :
   ```bash
   php artisan serve
   ```

9. **Accédez au site** :
   ```
   http://localhost:8000
   ```

## 🎨 Fonctionnalités testables

### ✅ Sur la version standalone
- ✅ Navigation complète avec dropdown
- ✅ Carousel automatique sur la page d'accueil
- ✅ Défilement horizontal des articles
- ✅ Défilement horizontal des alertes
- ✅ Filtrage et recherche des alertes
- ✅ Formulaire de déclaration d'incident
- ✅ Page de contact
- ✅ Design responsive
- ✅ Toutes les animations

### 🎨 Personnalisation

Les fichiers à modifier :
- **CSS** : `public/css/style.css` - Tous les styles
- **JavaScript** : `public/js/main.js` - Toutes les interactions
- **Données** : `standalone.php` - Les données d'exemple
- **Vues** : `resources/views/pages/` - Le HTML des pages

## ⚡ Conseils

1. **Pour tester sur mobile** :
   - Utilisez `php -S 0.0.0.0:8000 standalone.php`
   - Accédez depuis votre téléphone via l'IP de votre ordinateur

2. **Pour changer le port** :
   - Utilisez `php -S localhost:3000 standalone.php`

3. **Pour arrêter le serveur** :
   - Appuyez sur `Ctrl+C` dans le terminal

## 📞 Support

Si vous rencontrez des problèmes :
1. Vérifiez que PHP est installé : `php -v`
2. Vérifiez que vous êtes dans le bon dossier
3. Vérifiez que le port 8000 n'est pas déjà utilisé

## 🎯 Prochaines étapes

Une fois que vous avez testé et que vous êtes satisfait :
1. Activez l'extension fileinfo (voir ci-dessus)
2. Installez Laravel avec Composer
3. Connectez une base de données
4. Personnalisez le contenu

---

**Profitez de votre nouveau template CyberUI ! 🛡️**
