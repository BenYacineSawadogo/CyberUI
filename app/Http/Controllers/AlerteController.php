<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlerteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $gravity = $request->get('gravity', '');

        // Sample alerts data
        $alertes = [
            [
                'id' => 1,
                'title' => 'Vulnérabilité critique dans Apache Log4j',
                'summary' => 'Une faille de sécurité majeure a été découverte dans la bibliothèque Apache Log4j, permettant l\'exécution de code à distance.',
                'gravity' => 'critique',
                'status' => 'En cours',
                'progress' => 75,
                'date' => '2025-10-22',
                'reference' => 'ALERT-2025-001'
            ],
            [
                'id' => 2,
                'title' => 'Campagne de phishing ciblant les services bancaires',
                'summary' => 'Plusieurs institutions financières sont ciblées par une campagne de phishing sophistiquée.',
                'gravity' => 'élevée',
                'status' => 'En cours',
                'progress' => 60,
                'date' => '2025-10-21',
                'reference' => 'ALERT-2025-002'
            ],
            [
                'id' => 3,
                'title' => 'Mise à jour de sécurité Windows',
                'summary' => 'Microsoft a publié un correctif pour plusieurs vulnérabilités critiques.',
                'gravity' => 'moyenne',
                'status' => 'Résolu',
                'progress' => 100,
                'date' => '2025-10-20',
                'reference' => 'ALERT-2025-003'
            ],
            [
                'id' => 4,
                'title' => 'Faille de sécurité dans les routeurs domestiques',
                'summary' => 'Une vulnérabilité affecte plusieurs modèles de routeurs populaires.',
                'gravity' => 'élevée',
                'status' => 'En cours',
                'progress' => 40,
                'date' => '2025-10-19',
                'reference' => 'ALERT-2025-004'
            ],
            [
                'id' => 5,
                'title' => 'Attaque DDoS sur infrastructure critique',
                'summary' => 'Des infrastructures critiques ont été ciblées par des attaques DDoS massives.',
                'gravity' => 'critique',
                'status' => 'En surveillance',
                'progress' => 85,
                'date' => '2025-10-18',
                'reference' => 'ALERT-2025-005'
            ],
            [
                'id' => 6,
                'title' => 'Malware ciblant les appareils IoT',
                'summary' => 'Un nouveau malware infecte les appareils IoT non sécurisés.',
                'gravity' => 'moyenne',
                'status' => 'En cours',
                'progress' => 50,
                'date' => '2025-10-17',
                'reference' => 'ALERT-2025-006'
            ],
            [
                'id' => 7,
                'title' => 'Vulnérabilité dans les systèmes VPN',
                'summary' => 'Plusieurs solutions VPN présentent des failles de sécurité.',
                'gravity' => 'élevée',
                'status' => 'En cours',
                'progress' => 30,
                'date' => '2025-10-16',
                'reference' => 'ALERT-2025-007'
            ],
            [
                'id' => 8,
                'title' => 'Campagne de ransomware ciblant les PME',
                'summary' => 'Les petites et moyennes entreprises sont la cible d\'une nouvelle vague de ransomware.',
                'gravity' => 'critique',
                'status' => 'En cours',
                'progress' => 45,
                'date' => '2025-10-15',
                'reference' => 'ALERT-2025-008'
            ]
        ];

        // Filter by search
        if ($search) {
            $alertes = array_filter($alertes, function($alerte) use ($search) {
                return stripos($alerte['title'], $search) !== false ||
                       stripos($alerte['summary'], $search) !== false;
            });
        }

        // Filter by gravity
        if ($gravity) {
            $alertes = array_filter($alertes, function($alerte) use ($gravity) {
                return $alerte['gravity'] === $gravity;
            });
        }

        // Pagination simulation
        $perPage = 6;
        $currentPage = $request->get('page', 1);
        $total = count($alertes);
        $alertes = array_slice($alertes, ($currentPage - 1) * $perPage, $perPage);

        $pagination = [
            'current_page' => $currentPage,
            'total' => $total,
            'per_page' => $perPage,
            'last_page' => ceil($total / $perPage)
        ];

        return view('pages.alertes', compact('alertes', 'pagination', 'search', 'gravity'));
    }

    public function show($id)
    {
        // Sample alert detail
        $alerte = [
            'id' => $id,
            'title' => 'Vulnérabilité critique dans Apache Log4j',
            'summary' => 'Une faille de sécurité majeure a été découverte dans la bibliothèque Apache Log4j.',
            'content' => 'Description détaillée de l\'alerte...',
            'gravity' => 'critique',
            'status' => 'En cours',
            'progress' => 75,
            'date' => '2025-10-22',
            'reference' => 'ALERT-2025-001'
        ];

        return view('pages.alerte-detail', compact('alerte'));
    }
}
