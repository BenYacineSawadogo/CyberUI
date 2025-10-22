<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BulletinController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        // Sample bulletins data
        $bulletins = [
            [
                'id' => 1,
                'title' => 'Bulletin de sécurité - Semaine 43',
                'summary' => 'Synthèse hebdomadaire des alertes et recommandations.',
                'date' => '2025-10-22',
                'reference' => 'BULLETIN-2025-043'
            ],
            [
                'id' => 2,
                'title' => 'Bulletin de sécurité - Semaine 42',
                'summary' => 'Mise à jour des menaces et vulnérabilités de la semaine.',
                'date' => '2025-10-15',
                'reference' => 'BULLETIN-2025-042'
            ],
            [
                'id' => 3,
                'title' => 'Bulletin de sécurité - Semaine 41',
                'summary' => 'Rapport hebdomadaire sur l\'état de la menace cyber.',
                'date' => '2025-10-08',
                'reference' => 'BULLETIN-2025-041'
            ],
            [
                'id' => 4,
                'title' => 'Bulletin de sécurité - Semaine 40',
                'summary' => 'Veille hebdomadaire et recommandations de sécurité.',
                'date' => '2025-10-01',
                'reference' => 'BULLETIN-2025-040'
            ],
            [
                'id' => 5,
                'title' => 'Bulletin de sécurité - Semaine 39',
                'summary' => 'Synthèse des incidents et alertes de la semaine.',
                'date' => '2025-09-24',
                'reference' => 'BULLETIN-2025-039'
            ]
        ];

        // Filter by search
        if ($search) {
            $bulletins = array_filter($bulletins, function($bulletin) use ($search) {
                return stripos($bulletin['title'], $search) !== false ||
                       stripos($bulletin['summary'], $search) !== false;
            });
        }

        // Pagination simulation
        $perPage = 6;
        $currentPage = $request->get('page', 1);
        $total = count($bulletins);
        $bulletins = array_slice($bulletins, ($currentPage - 1) * $perPage, $perPage);

        $pagination = [
            'current_page' => $currentPage,
            'total' => $total,
            'per_page' => $perPage,
            'last_page' => ceil($total / $perPage)
        ];

        return view('pages.bulletins', compact('bulletins', 'pagination', 'search'));
    }

    public function show($id)
    {
        $bulletin = [
            'id' => $id,
            'title' => 'Bulletin de sécurité - Semaine 43',
            'summary' => 'Synthèse hebdomadaire des alertes et recommandations.',
            'content' => 'Contenu détaillé du bulletin...',
            'date' => '2025-10-22',
            'reference' => 'BULLETIN-2025-043'
        ];

        return view('pages.bulletin-detail', compact('bulletin'));
    }
}
