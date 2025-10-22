<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Sample data for carousel
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

        // Sample recent articles
        $recentArticles = [
            [
                'id' => 1,
                'title' => 'Les nouvelles menaces de phishing en 2025',
                'summary' => 'Découvrez les techniques les plus récentes utilisées par les cybercriminels.',
                'date' => '2025-10-20',
                'image' => 'article1.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Guide de sécurisation des mots de passe',
                'summary' => 'Meilleures pratiques pour créer et gérer des mots de passe sécurisés.',
                'date' => '2025-10-18',
                'image' => 'article2.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Intelligence Artificielle et Cybersécurité',
                'summary' => 'Comment l\'IA transforme la détection des menaces.',
                'date' => '2025-10-15',
                'image' => 'article3.jpg'
            ],
            [
                'id' => 4,
                'title' => 'Sécurité des infrastructures cloud',
                'summary' => 'Bonnes pratiques pour sécuriser vos données dans le cloud.',
                'date' => '2025-10-12',
                'image' => 'article4.jpg'
            ],
            [
                'id' => 5,
                'title' => 'Ransomware : Prévention et réponse',
                'summary' => 'Stratégies pour se protéger contre les attaques par ransomware.',
                'date' => '2025-10-10',
                'image' => 'article5.jpg'
            ]
        ];

        // Sample latest alerts
        $latestAlertes = [
            [
                'id' => 1,
                'title' => 'Vulnérabilité critique dans Apache Log4j',
                'gravity' => 'critique',
                'status' => 'En cours',
                'progress' => 75,
                'date' => '2025-10-22'
            ],
            [
                'id' => 2,
                'title' => 'Campagne de phishing ciblant les services bancaires',
                'gravity' => 'élevée',
                'status' => 'En cours',
                'progress' => 60,
                'date' => '2025-10-21'
            ],
            [
                'id' => 3,
                'title' => 'Mise à jour de sécurité Windows',
                'gravity' => 'moyenne',
                'status' => 'Résolu',
                'progress' => 100,
                'date' => '2025-10-20'
            ],
            [
                'id' => 4,
                'title' => 'Faille de sécurité dans les routeurs domestiques',
                'gravity' => 'élevée',
                'status' => 'En cours',
                'progress' => 40,
                'date' => '2025-10-19'
            ],
            [
                'id' => 5,
                'title' => 'Attaque DDoS sur infrastructure critique',
                'gravity' => 'critique',
                'status' => 'En surveillance',
                'progress' => 85,
                'date' => '2025-10-18'
            ]
        ];

        return view('pages.home', compact('carouselItems', 'recentArticles', 'latestAlertes'));
    }
}
