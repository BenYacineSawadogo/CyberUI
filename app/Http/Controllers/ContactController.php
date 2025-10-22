<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = [
            'email' => 'contact@cyberui.gov',
            'phone' => '+33 1 23 45 67 89',
            'website' => 'https://www.cyberui.gov',
            'address' => '123 Avenue de la Cybersécurité, 75001 Paris, France',
            'hours' => 'Lundi - Vendredi: 9h00 - 18h00'
        ];

        return view('pages.contact', compact('contactInfo'));
    }
}
