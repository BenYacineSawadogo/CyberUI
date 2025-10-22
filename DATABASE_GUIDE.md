# 🗄️ Guide de Base de Données - CyberUI

Ce guide vous explique comment rendre votre application **dynamique** en connectant une base de données MySQL, PostgreSQL, ou SQLite.

## 📋 Table des matières

1. [Configuration de la base de données](#1-configuration-de-la-base-de-données)
2. [Création des migrations](#2-création-des-migrations)
3. [Création des modèles](#3-création-des-modèles)
4. [Création des seeders](#4-création-des-seeders)
5. [Modification des contrôleurs](#5-modification-des-contrôleurs)
6. [Commandes utiles](#6-commandes-utiles)

---

## 1. Configuration de la base de données

### Option A : MySQL (Recommandé pour production)

#### Étape 1.1 : Créer la base de données

Ouvrez MySQL et créez une base de données :

```sql
CREATE DATABASE cyberui CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### Étape 1.2 : Configurer le fichier .env

Éditez le fichier `.env` à la racine du projet :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cyberui
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
```

⚠️ **Important** : Remplacez `votre_mot_de_passe` par votre vrai mot de passe MySQL.

---

### Option B : PostgreSQL

#### Étape 1.1 : Créer la base de données

```sql
CREATE DATABASE cyberui;
```

#### Étape 1.2 : Configurer le fichier .env

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=cyberui
DB_USERNAME=postgres
DB_PASSWORD=votre_mot_de_passe
```

---

### Option C : SQLite (Idéal pour développement)

#### Étape 1.1 : Créer le fichier de base de données

```bash
touch database/database.sqlite
```

#### Étape 1.2 : Configurer le fichier .env

```env
DB_CONNECTION=sqlite
DB_DATABASE=E:\Moyenga\CyberUI\database\database.sqlite
```

⚠️ **Important** : Utilisez le chemin absolu complet.

---

## 2. Création des migrations

Les migrations créent la structure de vos tables dans la base de données.

### Étape 2.1 : Créer les fichiers de migration

Dans PowerShell, exécutez :

```bash
php artisan make:migration create_articles_table
php artisan make:migration create_alertes_table
php artisan make:migration create_rapports_table
php artisan make:migration create_bulletins_table
php artisan make:migration create_documents_table
php artisan make:migration create_incidents_table
```

### Étape 2.2 : Éditer les migrations

#### Migration pour les Articles

Fichier : `database/migrations/xxxx_xx_xx_xxxxxx_create_articles_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summary');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->string('author')->nullable();
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
```

#### Migration pour les Alertes

Fichier : `database/migrations/xxxx_xx_xx_xxxxxx_create_alertes_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alertes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summary');
            $table->longText('content');
            $table->enum('gravity', ['faible', 'moyenne', 'élevée', 'critique']);
            $table->enum('status', ['nouveau', 'en_cours', 'résolu', 'en_surveillance']);
            $table->integer('progress')->default(0); // 0-100
            $table->string('reference')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alertes');
    }
};
```

#### Migration pour les Rapports

Fichier : `database/migrations/xxxx_xx_xx_xxxxxx_create_rapports_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summary');
            $table->longText('content');
            $table->enum('category', ['Annuel', 'Trimestriel', 'Mensuel', 'Thématique']);
            $table->string('reference')->unique();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
```

#### Migration pour les Bulletins

Fichier : `database/migrations/xxxx_xx_xx_xxxxxx_create_bulletins_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bulletins', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summary');
            $table->longText('content');
            $table->string('reference')->unique();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bulletins');
    }
};
```

#### Migration pour les Documents (Documentation)

Fichier : `database/migrations/xxxx_xx_xx_xxxxxx_create_documents_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['video', 'article', 'legal', 'pdf']);
            $table->string('category')->nullable();
            $table->string('file_path')->nullable();
            $table->string('url')->nullable();
            $table->string('duration')->nullable(); // Pour les vidéos
            $table->integer('pages')->nullable(); // Pour les PDFs
            $table->string('file_size')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
```

#### Migration pour les Incidents

Fichier : `database/migrations/xxxx_xx_xx_xxxxxx_create_incidents_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('organization');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->enum('incident_type', [
                'malware',
                'phishing',
                'ransomware',
                'data_breach',
                'ddos',
                'unauthorized_access',
                'vulnerability',
                'other'
            ]);
            $table->dateTime('incident_date');
            $table->enum('severity', ['low', 'medium', 'high', 'critical']);
            $table->longText('description');
            $table->text('affected_systems')->nullable();
            $table->text('actions_taken')->nullable();
            $table->enum('status', ['nouveau', 'en_traitement', 'résolu', 'fermé'])->default('nouveau');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
```

### Étape 2.3 : Exécuter les migrations

```bash
php artisan migrate
```

**Résultat attendu :**
```
Migration table created successfully.
Migrating: xxxx_xx_xx_xxxxxx_create_articles_table
Migrated:  xxxx_xx_xx_xxxxxx_create_articles_table (XX.XXms)
Migrating: xxxx_xx_xx_xxxxxx_create_alertes_table
Migrated:  xxxx_xx_xx_xxxxxx_create_alertes_table (XX.XXms)
...
```

✅ Vos tables sont maintenant créées dans la base de données !

---

## 3. Création des modèles

Les modèles permettent d'interagir avec vos tables de manière élégante.

### Étape 3.1 : Créer les modèles

```bash
php artisan make:model Article
php artisan make:model Alerte
php artisan make:model Rapport
php artisan make:model Bulletin
php artisan make:model Document
php artisan make:model Incident
```

### Étape 3.2 : Éditer les modèles

#### Modèle Article

Fichier : `app/Models/Article.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'content',
        'image',
        'author',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
        'created_at' => 'datetime',
    ];

    // Scope pour récupérer uniquement les articles publiés
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    // Scope pour les articles récents
    public function scopeRecent($query, $limit = 5)
    {
        return $query->published()
                     ->orderBy('created_at', 'desc')
                     ->limit($limit);
    }
}
```

#### Modèle Alerte

Fichier : `app/Models/Alerte.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'content',
        'gravity',
        'status',
        'progress',
        'reference',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // Scope pour les alertes récentes
    public function scopeRecent($query, $limit = 5)
    {
        return $query->orderBy('created_at', 'desc')->limit($limit);
    }

    // Scope pour filtrer par gravité
    public function scopeByGravity($query, $gravity)
    {
        if ($gravity) {
            return $query->where('gravity', $gravity);
        }
        return $query;
    }

    // Méthode pour obtenir la classe CSS du badge
    public function getGravityBadgeClass()
    {
        return 'badge-' . $this->gravity;
    }
}
```

#### Modèle Rapport

Fichier : `app/Models/Rapport.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'content',
        'category',
        'reference',
        'file_path',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // Scope pour filtrer par catégorie
    public function scopeByCategory($query, $category)
    {
        if ($category) {
            return $query->where('category', $category);
        }
        return $query;
    }
}
```

#### Modèle Bulletin

Fichier : `app/Models/Bulletin.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'content',
        'reference',
        'file_path',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
```

#### Modèle Document

Fichier : `app/Models/Document.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'category',
        'file_path',
        'url',
        'duration',
        'pages',
        'file_size',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // Scope pour filtrer par type
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Scopes pour chaque type
    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    public function scopeArticles($query)
    {
        return $query->where('type', 'article');
    }

    public function scopeLegal($query)
    {
        return $query->where('type', 'legal');
    }

    public function scopePdfs($query)
    {
        return $query->where('type', 'pdf');
    }
}
```

#### Modèle Incident

Fichier : `app/Models/Incident.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization',
        'contact_name',
        'contact_email',
        'contact_phone',
        'incident_type',
        'incident_date',
        'severity',
        'description',
        'affected_systems',
        'actions_taken',
        'status',
    ];

    protected $casts = [
        'incident_date' => 'datetime',
        'created_at' => 'datetime',
    ];
}
```

---

## 4. Création des seeders

Les seeders permettent de remplir votre base de données avec des données de test.

### Étape 4.1 : Créer les seeders

```bash
php artisan make:seeder ArticleSeeder
php artisan make:seeder AlerteSeeder
php artisan make:seeder RapportSeeder
php artisan make:seeder BulletinSeeder
php artisan make:seeder DocumentSeeder
```

### Étape 4.2 : Éditer les seeders

#### Seeder pour les Articles

Fichier : `database/seeders/ArticleSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('articles')->truncate();

        Article::create([
            'title' => 'Les nouvelles menaces de phishing en 2025',
            'summary' => 'Découvrez les techniques les plus récentes utilisées par les cybercriminels pour voler vos données.',
            'content' => 'Le phishing continue d\'évoluer avec des techniques de plus en plus sophistiquées...',
            'author' => 'Jean Dupont',
            'published' => true,
        ]);

        Article::create([
            'title' => 'Guide de sécurisation des mots de passe',
            'summary' => 'Meilleures pratiques pour créer et gérer des mots de passe sécurisés.',
            'content' => 'Un bon mot de passe est la première ligne de défense...',
            'author' => 'Marie Martin',
            'published' => true,
        ]);

        Article::create([
            'title' => 'Intelligence Artificielle et Cybersécurité',
            'summary' => 'Comment l\'IA transforme la détection des menaces.',
            'content' => 'L\'intelligence artificielle révolutionne la cybersécurité...',
            'author' => 'Pierre Durant',
            'published' => true,
        ]);

        Article::create([
            'title' => 'Sécurité des infrastructures cloud',
            'summary' => 'Bonnes pratiques pour sécuriser vos données dans le cloud.',
            'content' => 'Le cloud computing offre de nombreux avantages...',
            'author' => 'Sophie Leblanc',
            'published' => true,
        ]);

        Article::create([
            'title' => 'Ransomware : Prévention et réponse',
            'summary' => 'Stratégies pour se protéger contre les attaques par ransomware.',
            'content' => 'Les ransomwares sont une menace croissante...',
            'author' => 'Luc Bernard',
            'published' => true,
        ]);
    }
}
```

#### Seeder pour les Alertes

Fichier : `database/seeders/AlerteSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alerte;
use Illuminate\Support\Facades\DB;

class AlerteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alertes')->truncate();

        Alerte::create([
            'title' => 'Vulnérabilité critique dans Apache Log4j',
            'summary' => 'Une faille de sécurité majeure a été découverte dans la bibliothèque Apache Log4j.',
            'content' => 'Cette vulnérabilité permet l\'exécution de code à distance...',
            'gravity' => 'critique',
            'status' => 'en_cours',
            'progress' => 75,
            'reference' => 'ALERT-2025-001',
        ]);

        Alerte::create([
            'title' => 'Campagne de phishing ciblant les services bancaires',
            'summary' => 'Plusieurs institutions financières sont ciblées par une campagne de phishing sophistiquée.',
            'content' => 'Les attaquants utilisent des emails très convaincants...',
            'gravity' => 'élevée',
            'status' => 'en_cours',
            'progress' => 60,
            'reference' => 'ALERT-2025-002',
        ]);

        Alerte::create([
            'title' => 'Mise à jour de sécurité Windows',
            'summary' => 'Microsoft a publié un correctif pour plusieurs vulnérabilités critiques.',
            'content' => 'Il est fortement recommandé d\'installer ces mises à jour...',
            'gravity' => 'moyenne',
            'status' => 'résolu',
            'progress' => 100,
            'reference' => 'ALERT-2025-003',
        ]);

        Alerte::create([
            'title' => 'Faille de sécurité dans les routeurs domestiques',
            'summary' => 'Une vulnérabilité affecte plusieurs modèles de routeurs populaires.',
            'content' => 'Cette faille permet un accès non autorisé aux routeurs...',
            'gravity' => 'élevée',
            'status' => 'en_cours',
            'progress' => 40,
            'reference' => 'ALERT-2025-004',
        ]);

        Alerte::create([
            'title' => 'Attaque DDoS sur infrastructure critique',
            'summary' => 'Des infrastructures critiques ont été ciblées par des attaques DDoS massives.',
            'content' => 'Les attaques ont été détectées et mitigées...',
            'gravity' => 'critique',
            'status' => 'en_surveillance',
            'progress' => 85,
            'reference' => 'ALERT-2025-005',
        ]);

        Alerte::create([
            'title' => 'Malware ciblant les appareils IoT',
            'summary' => 'Un nouveau malware infecte les appareils IoT non sécurisés.',
            'content' => 'Ce malware exploite des mots de passe par défaut...',
            'gravity' => 'moyenne',
            'status' => 'en_cours',
            'progress' => 50,
            'reference' => 'ALERT-2025-006',
        ]);

        Alerte::create([
            'title' => 'Vulnérabilité dans les systèmes VPN',
            'summary' => 'Plusieurs solutions VPN présentent des failles de sécurité.',
            'content' => 'Les utilisateurs doivent mettre à jour leurs clients VPN...',
            'gravity' => 'élevée',
            'status' => 'en_cours',
            'progress' => 30,
            'reference' => 'ALERT-2025-007',
        ]);

        Alerte::create([
            'title' => 'Campagne de ransomware ciblant les PME',
            'summary' => 'Les petites et moyennes entreprises sont la cible d\'une nouvelle vague de ransomware.',
            'content' => 'Cette campagne utilise des emails de spear-phishing...',
            'gravity' => 'critique',
            'status' => 'en_cours',
            'progress' => 45,
            'reference' => 'ALERT-2025-008',
        ]);
    }
}
```

#### Seeder pour les Rapports

Fichier : `database/seeders/RapportSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rapport;
use Illuminate\Support\Facades\DB;

class RapportSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rapports')->truncate();

        Rapport::create([
            'title' => 'Rapport annuel sur la cybersécurité 2024',
            'summary' => 'Analyse complète des menaces et incidents de l\'année 2024.',
            'content' => 'Ce rapport présente une vue d\'ensemble...',
            'category' => 'Annuel',
            'reference' => 'RAPPORT-2025-001',
        ]);

        Rapport::create([
            'title' => 'Analyse des attaques par ransomware Q4 2024',
            'summary' => 'Étude approfondie des attaques par ransomware au dernier trimestre.',
            'content' => 'Le quatrième trimestre 2024 a vu une augmentation...',
            'category' => 'Trimestriel',
            'reference' => 'RAPPORT-2025-002',
        ]);

        Rapport::create([
            'title' => 'État des lieux de la sécurité des IoT',
            'summary' => 'Rapport sur les vulnérabilités des objets connectés.',
            'content' => 'Les objets connectés présentent de nombreux défis...',
            'category' => 'Thématique',
            'reference' => 'RAPPORT-2024-012',
        ]);

        Rapport::create([
            'title' => 'Menaces APT et espionnage industriel',
            'summary' => 'Analyse des menaces persistantes avancées ciblant les entreprises.',
            'content' => 'Les groupes APT continuent d\'évoluer...',
            'category' => 'Thématique',
            'reference' => 'RAPPORT-2024-011',
        ]);

        Rapport::create([
            'title' => 'Bilan mensuel octobre 2024',
            'summary' => 'Synthèse des incidents et alertes du mois d\'octobre.',
            'content' => 'Le mois d\'octobre a été marqué par...',
            'category' => 'Mensuel',
            'reference' => 'RAPPORT-2024-010',
        ]);
    }
}
```

#### Seeder pour les Bulletins

Fichier : `database/seeders/BulletinSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bulletin;
use Illuminate\Support\Facades\DB;

class BulletinSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bulletins')->truncate();

        Bulletin::create([
            'title' => 'Bulletin de sécurité - Semaine 43',
            'summary' => 'Synthèse hebdomadaire des alertes et recommandations.',
            'content' => 'Cette semaine, plusieurs vulnérabilités critiques...',
            'reference' => 'BULLETIN-2025-043',
        ]);

        Bulletin::create([
            'title' => 'Bulletin de sécurité - Semaine 42',
            'summary' => 'Mise à jour des menaces et vulnérabilités de la semaine.',
            'content' => 'Points clés de la semaine 42...',
            'reference' => 'BULLETIN-2025-042',
        ]);

        Bulletin::create([
            'title' => 'Bulletin de sécurité - Semaine 41',
            'summary' => 'Rapport hebdomadaire sur l\'état de la menace cyber.',
            'content' => 'Tendances observées cette semaine...',
            'reference' => 'BULLETIN-2025-041',
        ]);

        Bulletin::create([
            'title' => 'Bulletin de sécurité - Semaine 40',
            'summary' => 'Veille hebdomadaire et recommandations de sécurité.',
            'content' => 'Nouvelles vulnérabilités publiées...',
            'reference' => 'BULLETIN-2025-040',
        ]);

        Bulletin::create([
            'title' => 'Bulletin de sécurité - Semaine 39',
            'summary' => 'Synthèse des incidents et alertes de la semaine.',
            'content' => 'Activité cyber de la semaine...',
            'reference' => 'BULLETIN-2025-039',
        ]);
    }
}
```

#### Seeder pour les Documents

Fichier : `database/seeders/DocumentSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('documents')->truncate();

        // Vidéos
        Document::create([
            'title' => 'Introduction à la cybersécurité',
            'description' => 'Cours d\'introduction pour débutants',
            'type' => 'video',
            'category' => 'Formation',
            'duration' => '15:30',
        ]);

        Document::create([
            'title' => 'Protection contre le phishing',
            'description' => 'Comment reconnaître et éviter les emails de phishing',
            'type' => 'video',
            'category' => 'Tutoriel',
            'duration' => '12:45',
        ]);

        // Articles
        Document::create([
            'title' => 'Guide des bonnes pratiques en cybersécurité',
            'description' => 'Liste complète des recommandations',
            'type' => 'article',
            'category' => 'Guide',
        ]);

        Document::create([
            'title' => 'Comment sécuriser son environnement de travail',
            'description' => 'Conseils pratiques pour les professionnels',
            'type' => 'article',
            'category' => 'Article',
        ]);

        // Textes légaux
        Document::create([
            'title' => 'RGPD et protection des données',
            'description' => 'Règlement européen sur la protection des données',
            'type' => 'legal',
            'category' => 'Règlement',
        ]);

        Document::create([
            'title' => 'Loi sur la sécurité informatique',
            'description' => 'Cadre légal français',
            'type' => 'legal',
            'category' => 'Loi',
        ]);

        // PDFs
        Document::create([
            'title' => 'Manuel de réponse aux incidents',
            'description' => 'Procédures détaillées de gestion des incidents',
            'type' => 'pdf',
            'pages' => 45,
            'file_size' => '2.5 MB',
        ]);

        Document::create([
            'title' => 'Guide de configuration sécurisée',
            'description' => 'Hardening de serveurs et systèmes',
            'type' => 'pdf',
            'pages' => 62,
            'file_size' => '3.2 MB',
        ]);
    }
}
```

### Étape 4.3 : Enregistrer les seeders dans DatabaseSeeder

Fichier : `database/seeders/DatabaseSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ArticleSeeder::class,
            AlerteSeeder::class,
            RapportSeeder::class,
            BulletinSeeder::class,
            DocumentSeeder::class,
        ]);
    }
}
```

### Étape 4.4 : Exécuter les seeders

```bash
php artisan db:seed
```

**Résultat attendu :**
```
Seeding: Database\Seeders\ArticleSeeder
Seeded:  Database\Seeders\ArticleSeeder (XX.XXms)
Seeding: Database\Seeders\AlerteSeeder
Seeded:  Database\Seeders\AlerteSeeder (XX.XXms)
...
```

✅ Votre base de données est maintenant remplie avec des données de test !

---

## 5. Modification des contrôleurs

Maintenant, modifions les contrôleurs pour utiliser les données de la base de données au lieu des données statiques.

### Étape 5.1 : Modifier HomeController

Fichier : `app/Http/Controllers/HomeController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Alerte;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Carousel (données statiques pour l'instant)
        $carouselItems = [
            [
                'title' => 'Sécurité Numérique',
                'description' => 'Protégez vos données et systèmes contre les cybermenaces',
                'image' => 'cyber1.jpg'
            ],
            [
                'title' => 'Vigilance Permanente',
                'description' => 'Restez informé des dernières alertes de sécurité',
                'image' => 'cyber2.jpg'
            ],
            [
                'title' => 'Expertise & Conseil',
                'description' => 'Bénéficiez de notre expertise en cybersécurité',
                'image' => 'cyber3.jpg'
            ]
        ];

        // Articles récents depuis la base de données
        $recentArticles = Article::recent(5)->get();

        // Alertes récentes depuis la base de données
        $latestAlertes = Alerte::recent(5)->get();

        return view('pages.home', compact('carouselItems', 'recentArticles', 'latestAlertes'));
    }
}
```

### Étape 5.2 : Modifier AlerteController

Fichier : `app/Http/Controllers/AlerteController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use Illuminate\Http\Request;

class AlerteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $gravity = $request->get('gravity', '');

        // Query builder avec recherche et filtre
        $query = Alerte::query();

        // Recherche dans le titre et le résumé
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        // Filtre par gravité
        $query->byGravity($gravity);

        // Pagination
        $alertes = $query->orderBy('created_at', 'desc')->paginate(6);

        return view('pages.alertes', compact('alertes', 'search', 'gravity'));
    }

    public function show($id)
    {
        $alerte = Alerte::findOrFail($id);
        return view('pages.alerte-detail', compact('alerte'));
    }
}
```

### Étape 5.3 : Modifier RapportController

Fichier : `app/Http/Controllers/RapportController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $category = $request->get('category', '');

        $query = Rapport::query();

        // Recherche
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        // Filtre par catégorie
        $query->byCategory($category);

        // Pagination
        $rapports = $query->orderBy('created_at', 'desc')->paginate(6);

        return view('pages.rapports', compact('rapports', 'search', 'category'));
    }

    public function show($id)
    {
        $rapport = Rapport::findOrFail($id);
        return view('pages.rapport-detail', compact('rapport'));
    }
}
```

### Étape 5.4 : Modifier BulletinController

Fichier : `app/Http/Controllers/BulletinController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $query = Bulletin::query();

        // Recherche
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        // Pagination
        $bulletins = $query->orderBy('created_at', 'desc')->paginate(6);

        return view('pages.bulletins', compact('bulletins', 'search'));
    }

    public function show($id)
    {
        $bulletin = Bulletin::findOrFail($id);
        return view('pages.bulletin-detail', compact('bulletin'));
    }
}
```

### Étape 5.5 : Modifier DocumentationController

Fichier : `app/Http/Controllers/DocumentationController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index()
    {
        // Récupérer les documents par type
        $videos = Document::videos()->orderBy('created_at', 'desc')->get();
        $articles = Document::articles()->orderBy('created_at', 'desc')->get();
        $legal = Document::legal()->orderBy('created_at', 'desc')->get();
        $pdfs = Document::pdfs()->orderBy('created_at', 'desc')->get();

        return view('pages.documentation', compact('videos', 'articles', 'legal', 'pdfs'));
    }
}
```

### Étape 5.6 : Modifier IncidentController

Fichier : `app/Http/Controllers/IncidentController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function create()
    {
        return view('pages.incident-form');
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'organization' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'incident_type' => 'required|string',
            'incident_date' => 'required|date',
            'severity' => 'required|string',
            'description' => 'required|string',
            'affected_systems' => 'nullable|string',
            'actions_taken' => 'nullable|string',
        ]);

        // Créer l'incident dans la base de données
        Incident::create($validated);

        // Rediriger avec message de succès
        return redirect()->route('home')->with('success', 'Votre déclaration d\'incident a été soumise avec succès. Notre équipe vous contactera prochainement.');
    }
}
```

---

## 6. Commandes utiles

### Réinitialiser et repeupler la base de données

```bash
php artisan migrate:fresh --seed
```

Cette commande :
1. Supprime toutes les tables
2. Recrée toutes les tables
3. Exécute tous les seeders

### Vider le cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Voir toutes les routes

```bash
php artisan route:list
```

### Accéder à la base de données (tinker)

```bash
php artisan tinker
```

Exemples dans tinker :
```php
// Compter les alertes
Alerte::count()

// Récupérer toutes les alertes critiques
Alerte::where('gravity', 'critique')->get()

// Créer une nouvelle alerte
Alerte::create([
    'title' => 'Test',
    'summary' => 'Test summary',
    'content' => 'Test content',
    'gravity' => 'moyenne',
    'status' => 'nouveau',
    'progress' => 0,
    'reference' => 'TEST-001'
])
```

---

## 7. Tester l'application

### Étape 7.1 : Vider le cache

```bash
php artisan config:clear
php artisan cache:clear
```

### Étape 7.2 : Lancer le serveur

```bash
php artisan serve
```

### Étape 7.3 : Tester dans le navigateur

Allez à : `http://localhost:8000`

**Ce que vous devriez voir :**

✅ Page d'accueil avec :
- Articles récents **depuis la base de données**
- Alertes récentes **depuis la base de données**

✅ Page Alertes (`/alertes`) :
- Liste des alertes **depuis la base de données**
- Recherche fonctionnelle
- Filtres fonctionnels
- Pagination fonctionnelle

✅ Formulaire d'incident (`/declarer-incident`) :
- Les données sont maintenant **sauvegardées dans la base de données**

---

## 8. Gestion des données

### Ajouter une nouvelle alerte

Vous pouvez ajouter des données via :

#### Option A : Interface d'administration (à créer)
Créez un panel d'administration avec Laravel Nova ou Filament.

#### Option B : Via tinker
```bash
php artisan tinker
```

```php
Alerte::create([
    'title' => 'Nouvelle vulnérabilité détectée',
    'summary' => 'Description courte',
    'content' => 'Description détaillée...',
    'gravity' => 'critique',
    'status' => 'nouveau',
    'progress' => 0,
    'reference' => 'ALERT-2025-009'
]);
```

#### Option C : Directement en SQL
```sql
INSERT INTO alertes (title, summary, content, gravity, status, progress, reference, created_at, updated_at)
VALUES (
    'Titre de l\'alerte',
    'Résumé',
    'Contenu détaillé',
    'critique',
    'nouveau',
    0,
    'ALERT-2025-009',
    NOW(),
    NOW()
);
```

### Modifier des données

```php
// Dans tinker
$alerte = Alerte::find(1);
$alerte->progress = 100;
$alerte->status = 'résolu';
$alerte->save();
```

### Supprimer des données

```php
// Dans tinker
Alerte::find(1)->delete();
```

---

## 9. Bonnes pratiques

### Sécurité

1. **Ne jamais commiter le fichier .env**
2. **Utiliser des transactions** pour les opérations critiques
3. **Valider toutes les entrées utilisateur**
4. **Utiliser des requêtes préparées** (Eloquent le fait automatiquement)

### Performance

1. **Utiliser la pagination** pour les grandes listes
2. **Mettre en cache** les données fréquemment consultées
3. **Indexer** les colonnes utilisées dans les recherches

### Maintenance

1. **Créer des backups réguliers** de la base de données
2. **Documenter** les modifications de schéma
3. **Versionner** les migrations

---

## 10. Prochaines étapes

1. **Créer un panel d'administration** pour gérer facilement les données
2. **Ajouter l'authentification** pour sécuriser l'accès
3. **Implémenter des API REST** pour des applications externes
4. **Ajouter des notifications** par email pour les nouveaux incidents
5. **Créer des rapports automatiques** basés sur les données

---

## 📞 Besoin d'aide ?

Si vous rencontrez des problèmes :

1. **Vérifiez les logs** : `storage/logs/laravel.log`
2. **Testez la connexion** : `php artisan tinker` puis `DB::connection()->getPdo()`
3. **Vérifiez les migrations** : `php artisan migrate:status`

---

**Félicitations ! 🎉** Votre application CyberUI est maintenant complètement dynamique et connectée à une base de données !
