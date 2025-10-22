<?php

/**
 * CyberUI Entry Point
 *
 * This is a simplified entry point for the application.
 * For a full Laravel installation, you would typically use:
 * php artisan serve
 */

// Define base paths
define('BASE_PATH', __DIR__);

// Simple router for demo purposes
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route mapping
$routes = [
    '/' => 'home',
    '/alertes' => 'alertes',
    '/rapports' => 'rapports',
    '/bulletins' => 'bulletins',
    '/documentation' => 'documentation',
    '/contact' => 'contact',
    '/declarer-incident' => 'incident',
];

// Basic routing (this is a simplified version for demo)
// In production, Laravel's routing system would handle this
if ($uri === '/' || array_key_exists($uri, $routes)) {
    echo "CyberUI - Modern Cybersecurity Website Template\n\n";
    echo "This is a Laravel application template.\n\n";
    echo "To run this application:\n";
    echo "1. Install Laravel and Composer\n";
    echo "2. Run: composer install\n";
    echo "3. Configure your .env file\n";
    echo "4. Run: php artisan serve\n";
    echo "5. Visit: http://localhost:8000\n\n";
    echo "Available routes:\n";
    foreach ($routes as $route => $name) {
        echo "  - {$route}\n";
    }
} else {
    http_response_code(404);
    echo "404 - Page not found";
}
