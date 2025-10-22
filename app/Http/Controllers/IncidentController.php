<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function create()
    {
        return view('pages.incident-form');
    }

    public function store(Request $request)
    {
        // Validate the request
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

        // In a real application, you would save this to the database
        // For now, we'll just redirect with a success message

        return redirect()->route('home')->with('success', 'Votre déclaration d\'incident a été soumise avec succès. Notre équipe vous contactera prochainement.');
    }
}
