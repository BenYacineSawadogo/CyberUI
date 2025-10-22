# Guide de résolution - Extension fileinfo manquante

## Problème
L'extension PHP fileinfo n'est pas activée, ce qui empêche l'installation de Laravel.

## Solution : Activer l'extension fileinfo

### Étape 1 : Ouvrir le fichier php.ini
Localisez votre fichier php.ini à :
```
C:\Program Files\php-8.4.13\php.ini
```

### Étape 2 : Activer l'extension
1. Ouvrez le fichier php.ini avec un éditeur de texte (en tant qu'administrateur)
2. Recherchez la ligne suivante :
   ```
   ;extension=fileinfo
   ```
   ou
   ```
   ;extension=php_fileinfo.dll
   ```

3. Supprimez le point-virgule (;) au début de la ligne pour l'activer :
   ```
   extension=fileinfo
   ```
   ou
   ```
   extension=php_fileinfo.dll
   ```

### Étape 3 : Vérifier l'activation
Après avoir sauvegardé le fichier, exécutez :
```bash
php -m | grep fileinfo
```

Si l'extension est activée, vous verrez "fileinfo" dans la liste.

### Étape 4 : Relancer Composer
```bash
composer install
```

## Alternative temporaire (non recommandée pour la production)
Si vous voulez tester rapidement sans activer l'extension :
```bash
composer install --ignore-platform-req=ext-fileinfo
```

⚠️ Note : Cette solution temporaire peut causer des problèmes avec l'upload de fichiers et la détection de types MIME.
