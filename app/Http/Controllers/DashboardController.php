<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Actualite;
use App\Models\Colis;
use App\Models\Partenaire;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques
        $stats = [
            'produits' => Produit::count(),
            'actualites' => Actualite::count(),
            'colis' => Colis::count(),
            'partenaires' => Partenaire::count(),
        ];

        // Activités récentes (combinaison de toutes les entités)
        $recentActivities = $this->getRecentActivities();

        // Derniers produits
        $latestProducts = Produit::latest()
            ->take(3)
            ->get();

        // Dernières actualités
        $latestNews = Actualite::latest()
            ->take(3)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentActivities',
            'latestProducts',
            'latestNews'
        ));
    }

    /**
     * Récupère les activités récentes de toutes les entités
     */
    private function getRecentActivities()
    {
        $activities = collect();

        // Produits récents
        $produits = Produit::latest()
            ->take(3)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'icon' => 'fa-pills',
                    'description' => "Nouveau produit ajouté : {$item->designation_commerciale}",
                    'created_at' => $item->created_at,
                    'type' => 'produit'
                ];
            });

        // Actualités récentes
        $actualites = Actualite::latest()
            ->take(3)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'icon' => 'fa-newspaper',
                    'description' => "Nouvelle actualité publiée : {$item->title}",
                    'created_at' => $item->created_at,
                    'type' => 'actualite'
                ];
            });

        // Colis récents
        $colis = Colis::latest()
            ->take(3)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'icon' => 'fa-box',
                    'description' => "Nouveau colis soumis : {$item->numero_colis}",
                    'created_at' => $item->created_at,
                    'type' => 'colis'
                ];
            });

        // Partenaires récents
        $partenaires = Partenaire::latest()
            ->take(3)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'icon' => 'fa-handshake',
                    'description' => "Nouveau partenaire ajouté : {$item->nom}",
                    'created_at' => $item->created_at,
                    'type' => 'partenaire'
                ];
            });

        // Publications récentes
        $publications = Publication::latest()
            ->take(2)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'icon' => 'fa-book',
                    'description' => "Nouvelle publication : {$item->titre}",
                    'created_at' => $item->created_at,
                    'type' => 'publication'
                ];
            });

        // Fusionner toutes les activités
        $activities = $activities
            ->merge($produits)
            ->merge($actualites)
            ->merge($colis)
            ->merge($partenaires)
            ->merge($publications)
            ->sortByDesc('created_at')
            ->take(4); // Limiter à 8 activités récentes

        return $activities;
    }
}