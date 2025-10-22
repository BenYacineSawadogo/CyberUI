<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $category = $request->get('category', '');

        // Sample reports data
        $rapports = [
            [
                'id' => 1,
                'title' => 'Rapport annuel sur la cybersécurité 2024',
                'summary' => 'Analyse complète des menaces et incidents de l\'année 2024.',
                'category' => 'Annuel',
                'date' => '2025-01-15',
                'reference' => 'RAPPORT-2025-001'
            ],
            [
                'id' => 2,
                'title' => 'Analyse des attaques par ransomware Q4 2024',
                'summary' => 'Étude approfondie des attaques par ransomware au dernier trimestre.',
                'category' => 'Trimestriel',
                'date' => '2025-01-10',
                'reference' => 'RAPPORT-2025-002'
            ],
            [
                'id' => 3,
                'title' => 'État des lieux de la sécurité des IoT',
                'summary' => 'Rapport sur les vulnérabilités des objets connectés.',
                'category' => 'Thématique',
                'date' => '2024-12-20',
                'reference' => 'RAPPORT-2024-012'
            ],
            [
                'id' => 4,
                'title' => 'Menaces APT et espionnage industriel',
                'summary' => 'Analyse des menaces persistantes avancées ciblant les entreprises.',
                'category' => 'Thématique',
                'date' => '2024-12-05',
                'reference' => 'RAPPORT-2024-011'
            ],
            [
                'id' => 5,
                'title' => 'Bilan mensuel octobre 2024',
                'summary' => 'Synthèse des incidents et alertes du mois d\'octobre.',
                'category' => 'Mensuel',
                'date' => '2024-11-01',
                'reference' => 'RAPPORT-2024-010'
            ]
        ];

        // Filter by search
        if ($search) {
            $rapports = array_filter($rapports, function($rapport) use ($search) {
                return stripos($rapport['title'], $search) !== false ||
                       stripos($rapport['summary'], $search) !== false;
            });
        }

        // Filter by category
        if ($category) {
            $rapports = array_filter($rapports, function($rapport) use ($category) {
                return $rapport['category'] === $category;
            });
        }

        // Pagination simulation
        $perPage = 6;
        $currentPage = $request->get('page', 1);
        $total = count($rapports);
        $rapports = array_slice($rapports, ($currentPage - 1) * $perPage, $perPage);

        $pagination = [
            'current_page' => $currentPage,
            'total' => $total,
            'per_page' => $perPage,
            'last_page' => ceil($total / $perPage)
        ];

        return view('pages.rapports', compact('rapports', 'pagination', 'search', 'category'));
    }

    public function show($id)
    {
        $rapport = [
            'id' => $id,
            'title' => 'Rapport annuel sur la cybersécurité 2024',
            'summary' => 'Analyse complète des menaces et incidents de l\'année 2024.',
            'content' => 'Contenu détaillé du rapport...',
            'category' => 'Annuel',
            'date' => '2025-01-15',
            'reference' => 'RAPPORT-2025-001'
        ];

        return view('pages.rapport-detail', compact('rapport'));
    }
}
