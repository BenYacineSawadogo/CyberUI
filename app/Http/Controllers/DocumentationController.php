<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index()
    {
        // Sample documentation data
        $videos = [
            [
                'id' => 1,
                'title' => 'Introduction à la cybersécurité',
                'thumbnail' => 'video1.jpg',
                'duration' => '15:30',
                'category' => 'Formation'
            ],
            [
                'id' => 2,
                'title' => 'Protection contre le phishing',
                'thumbnail' => 'video2.jpg',
                'duration' => '12:45',
                'category' => 'Tutoriel'
            ],
            [
                'id' => 3,
                'title' => 'Sécurité des réseaux',
                'thumbnail' => 'video3.jpg',
                'duration' => '20:15',
                'category' => 'Formation'
            ],
            [
                'id' => 4,
                'title' => 'Gestion des incidents',
                'thumbnail' => 'video4.jpg',
                'duration' => '18:00',
                'category' => 'Guide'
            ]
        ];

        $articles = [
            [
                'id' => 1,
                'title' => 'Guide des bonnes pratiques en cybersécurité',
                'category' => 'Guide',
                'date' => '2025-10-15'
            ],
            [
                'id' => 2,
                'title' => 'Comment sécuriser son environnement de travail',
                'category' => 'Article',
                'date' => '2025-10-10'
            ],
            [
                'id' => 3,
                'title' => 'Les fondamentaux de la cryptographie',
                'category' => 'Formation',
                'date' => '2025-10-05'
            ],
            [
                'id' => 4,
                'title' => 'Audit de sécurité : méthodologie',
                'category' => 'Guide',
                'date' => '2025-09-28'
            ]
        ];

        $legal = [
            [
                'id' => 1,
                'title' => 'RGPD et protection des données',
                'type' => 'Règlement',
                'date' => '2025-05-25'
            ],
            [
                'id' => 2,
                'title' => 'Loi sur la sécurité informatique',
                'type' => 'Loi',
                'date' => '2024-12-01'
            ],
            [
                'id' => 3,
                'title' => 'Directive NIS2',
                'type' => 'Directive',
                'date' => '2024-10-15'
            ],
            [
                'id' => 4,
                'title' => 'Charte de la cybersécurité',
                'type' => 'Charte',
                'date' => '2024-06-01'
            ]
        ];

        $pdfs = [
            [
                'id' => 1,
                'title' => 'Manuel de réponse aux incidents',
                'size' => '2.5 MB',
                'pages' => 45,
                'date' => '2025-10-01'
            ],
            [
                'id' => 2,
                'title' => 'Guide de configuration sécurisée',
                'size' => '3.2 MB',
                'pages' => 62,
                'date' => '2025-09-15'
            ],
            [
                'id' => 3,
                'title' => 'Plan de continuité d\'activité',
                'size' => '1.8 MB',
                'pages' => 38,
                'date' => '2025-09-01'
            ],
            [
                'id' => 4,
                'title' => 'Politique de sécurité des systèmes d\'information',
                'size' => '4.1 MB',
                'pages' => 78,
                'date' => '2025-08-20'
            ]
        ];

        return view('pages.documentation', compact('videos', 'articles', 'legal', 'pdfs'));
    }
}
