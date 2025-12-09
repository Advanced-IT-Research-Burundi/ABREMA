<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Actualite;
use App\Models\Partenaire;
use App\Models\Colis;


class dashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'produits' => Produit::count(),
            'actualites' => Actualite::count(),
            'partenaires' => Partenaire::count(),
            'colis' => Colis::count(),
        ];

        $recentActualites = Actualite::latest()->take(5)->get();
        $recentProduits = Produit::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentActualites', 'recentProduits'));
    }
}

