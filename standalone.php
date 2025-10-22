<?php
/**
 * CyberUI - Standalone Version (Sans Laravel)
 * Version simple qui fonctionne sans Composer ni Laravel
 */

// Configuration
$baseUrl = '';
$currentPage = $_GET['page'] ?? 'home';

// Fonction helper pour inclure les vues
function view($viewName, $data = []) {
    extract($data);
    $viewPath = __DIR__ . "/resources/views/pages/{$viewName}.php";
    if (file_exists($viewPath)) {
        include $viewPath;
    } else {
        echo "View not found: {$viewName}";
    }
}

// Fonction pour générer les URLs
function route($name, $params = []) {
    $routes = [
        'home' => '?page=home',
        'alertes.index' => '?page=alertes',
        'alertes.show' => '?page=alerte-detail&id=' . ($params[0] ?? ''),
        'rapports.index' => '?page=rapports',
        'rapports.show' => '?page=rapport-detail&id=' . ($params[0] ?? ''),
        'bulletins.index' => '?page=bulletins',
        'bulletins.show' => '?page=bulletin-detail&id=' . ($params[0] ?? ''),
        'documentation.index' => '?page=documentation',
        'contact.index' => '?page=contact',
        'incident.create' => '?page=incident-form',
        'incident.store' => '?page=incident-form',
    ];
    return $routes[$name] ?? '#';
}

// Fonction pour vérifier la route active
function routeIs($name) {
    global $currentPage;
    $mapping = [
        'home' => 'home',
        'alertes.*' => 'alertes',
        'rapports.*' => 'rapports',
        'bulletins.*' => 'bulletins',
        'documentation.*' => 'documentation',
        'contact.*' => 'contact',
        'incident.*' => 'incident-form',
    ];

    foreach ($mapping as $pattern => $page) {
        if (str_ends_with($pattern, '.*')) {
            $base = str_replace('.*', '', $pattern);
            if (str_starts_with($currentPage, $base)) {
                return str_starts_with($name, $base);
            }
        } elseif ($pattern === $name && $page === $currentPage) {
            return true;
        }
    }
    return false;
}

// Router
switch ($currentPage) {
    case 'home':
        // Données pour la page d'accueil
        $carouselItems = [
            ['title' => 'Sécurité Numérique', 'description' => 'Protégez vos données et systèmes contre les cybermenaces', 'image' => 'cyber1.jpg'],
            ['title' => 'Vigilance Permanente', 'description' => 'Restez informé des dernières alertes de sécurité', 'image' => 'cyber2.jpg'],
            ['title' => 'Expertise & Conseil', 'description' => 'Bénéficiez de notre expertise en cybersécurité', 'image' => 'cyber3.jpg']
        ];

        $recentArticles = [
            ['id' => 1, 'title' => 'Les nouvelles menaces de phishing en 2025', 'summary' => 'Découvrez les techniques les plus récentes utilisées par les cybercriminels.', 'date' => '2025-10-20', 'image' => 'article1.jpg'],
            ['id' => 2, 'title' => 'Guide de sécurisation des mots de passe', 'summary' => 'Meilleures pratiques pour créer et gérer des mots de passe sécurisés.', 'date' => '2025-10-18', 'image' => 'article2.jpg'],
            ['id' => 3, 'title' => 'Intelligence Artificielle et Cybersécurité', 'summary' => 'Comment l\'IA transforme la détection des menaces.', 'date' => '2025-10-15', 'image' => 'article3.jpg'],
            ['id' => 4, 'title' => 'Sécurité des infrastructures cloud', 'summary' => 'Bonnes pratiques pour sécuriser vos données dans le cloud.', 'date' => '2025-10-12', 'image' => 'article4.jpg'],
            ['id' => 5, 'title' => 'Ransomware : Prévention et réponse', 'summary' => 'Stratégies pour se protéger contre les attaques par ransomware.', 'date' => '2025-10-10', 'image' => 'article5.jpg']
        ];

        $latestAlertes = [
            ['id' => 1, 'title' => 'Vulnérabilité critique dans Apache Log4j', 'gravity' => 'critique', 'status' => 'En cours', 'progress' => 75, 'date' => '2025-10-22'],
            ['id' => 2, 'title' => 'Campagne de phishing ciblant les services bancaires', 'gravity' => 'élevée', 'status' => 'En cours', 'progress' => 60, 'date' => '2025-10-21'],
            ['id' => 3, 'title' => 'Mise à jour de sécurité Windows', 'gravity' => 'moyenne', 'status' => 'Résolu', 'progress' => 100, 'date' => '2025-10-20'],
            ['id' => 4, 'title' => 'Faille de sécurité dans les routeurs domestiques', 'gravity' => 'élevée', 'status' => 'En cours', 'progress' => 40, 'date' => '2025-10-19'],
            ['id' => 5, 'title' => 'Attaque DDoS sur infrastructure critique', 'gravity' => 'critique', 'status' => 'En surveillance', 'progress' => 85, 'date' => '2025-10-18']
        ];

        include __DIR__ . '/resources/views/layouts/header.php';
        include __DIR__ . '/resources/views/pages/home-standalone.php';
        include __DIR__ . '/resources/views/layouts/footer.php';
        break;

    case 'alertes':
        $search = $_GET['search'] ?? '';
        $gravity = $_GET['gravity'] ?? '';

        $alertes = [
            ['id' => 1, 'title' => 'Vulnérabilité critique dans Apache Log4j', 'summary' => 'Une faille de sécurité majeure a été découverte dans la bibliothèque Apache Log4j, permettant l\'exécution de code à distance.', 'gravity' => 'critique', 'status' => 'En cours', 'progress' => 75, 'date' => '2025-10-22', 'reference' => 'ALERT-2025-001'],
            ['id' => 2, 'title' => 'Campagne de phishing ciblant les services bancaires', 'summary' => 'Plusieurs institutions financières sont ciblées par une campagne de phishing sophistiquée.', 'gravity' => 'élevée', 'status' => 'En cours', 'progress' => 60, 'date' => '2025-10-21', 'reference' => 'ALERT-2025-002'],
            ['id' => 3, 'title' => 'Mise à jour de sécurité Windows', 'summary' => 'Microsoft a publié un correctif pour plusieurs vulnérabilités critiques.', 'gravity' => 'moyenne', 'status' => 'Résolu', 'progress' => 100, 'date' => '2025-10-20', 'reference' => 'ALERT-2025-003'],
            ['id' => 4, 'title' => 'Faille de sécurité dans les routeurs domestiques', 'summary' => 'Une vulnérabilité affecte plusieurs modèles de routeurs populaires.', 'gravity' => 'élevée', 'status' => 'En cours', 'progress' => 40, 'date' => '2025-10-19', 'reference' => 'ALERT-2025-004'],
            ['id' => 5, 'title' => 'Attaque DDoS sur infrastructure critique', 'summary' => 'Des infrastructures critiques ont été ciblées par des attaques DDoS massives.', 'gravity' => 'critique', 'status' => 'En surveillance', 'progress' => 85, 'date' => '2025-10-18', 'reference' => 'ALERT-2025-005'],
            ['id' => 6, 'title' => 'Malware ciblant les appareils IoT', 'summary' => 'Un nouveau malware infecte les appareils IoT non sécurisés.', 'gravity' => 'moyenne', 'status' => 'En cours', 'progress' => 50, 'date' => '2025-10-17', 'reference' => 'ALERT-2025-006'],
        ];

        // Filter
        if ($search) {
            $alertes = array_filter($alertes, function($alerte) use ($search) {
                return stripos($alerte['title'], $search) !== false || stripos($alerte['summary'], $search) !== false;
            });
        }
        if ($gravity) {
            $alertes = array_filter($alertes, function($alerte) use ($gravity) {
                return $alerte['gravity'] === $gravity;
            });
        }

        $perPage = 6;
        $currentPageNum = $_GET['pagenum'] ?? 1;
        $total = count($alertes);
        $alertes = array_slice($alertes, ($currentPageNum - 1) * $perPage, $perPage);

        $pagination = [
            'current_page' => $currentPageNum,
            'total' => $total,
            'per_page' => $perPage,
            'last_page' => ceil($total / $perPage)
        ];

        include __DIR__ . '/resources/views/layouts/header.php';
        include __DIR__ . '/resources/views/pages/alertes-standalone.php';
        include __DIR__ . '/resources/views/layouts/footer.php';
        break;

    case 'contact':
        $contactInfo = [
            'email' => 'contact@cyberui.gov',
            'phone' => '+33 1 23 45 67 89',
            'website' => 'https://www.cyberui.gov',
            'address' => '123 Avenue de la Cybersécurité, 75001 Paris, France',
            'hours' => 'Lundi - Vendredi: 9h00 - 18h00'
        ];

        include __DIR__ . '/resources/views/layouts/header.php';
        include __DIR__ . '/resources/views/pages/contact-standalone.php';
        include __DIR__ . '/resources/views/layouts/footer.php';
        break;

    case 'incident-form':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission
            $success = "Votre déclaration d'incident a été soumise avec succès. Notre équipe vous contactera prochainement.";
        }

        include __DIR__ . '/resources/views/layouts/header.php';
        include __DIR__ . '/resources/views/pages/incident-standalone.php';
        include __DIR__ . '/resources/views/layouts/footer.php';
        break;

    default:
        include __DIR__ . '/resources/views/layouts/header.php';
        echo '<div class="container" style="padding: 4rem 0; text-align: center;">';
        echo '<h1>Page en construction</h1>';
        echo '<p>Cette page sera bientôt disponible.</p>';
        echo '<a href="?page=home" class="btn btn-primary">Retour à l\'accueil</a>';
        echo '</div>';
        include __DIR__ . '/resources/views/layouts/footer.php';
        break;
}
