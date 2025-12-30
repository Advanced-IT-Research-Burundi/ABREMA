<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Client;
use App\Models\PointEntree;
use App\Models\AvisPublic;

class HomeController extends Controller
{
    public function index()
    {
        $actualites = Actualite::latest()->paginate(3);
        $partenaires = Partenaire::latest()->get();
        // Récupérer les clients et ajouter l'icône à chacun
        $clients = Client::latest()->get()->map(function($client) {
            $client->icon = $this->getClientIcon($client->name);
            return $client;
        });

        // $pointEntrees = PointEntree::latest()->get();
        return view('web.index', compact('actualites', 'partenaires', 'clients'));
    }

    public function actualite()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        $actualites = Actualite::latest()->paginate(10);
        return view('information.actualite', compact('actualites','avisPublics'));
    }

    public function evenement()
    {
        $avisPublics = AvisPublic::latest()->paginate(10);
        return view('information.evenement', compact('avisPublics'));
    }

    public function document()
    {
        $avisPublics = AvisPublic::latest()->paginate(10);
        return view('information.evenement', compact('avisPublics'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->back()->with('error', 'Veuillez entrer un mot clé.');
        }

        $actualites = Actualite::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        $produits = Produit::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        $partenaires = Partenaire::where('nom', 'LIKE', "%{$query}%")
            ->get();

        return view('web.index', compact('query', 'actualites', 'produits', 'partenaires'));
    }

    public function showActualite($id)
    {
        $actualite = Actualite::findOrFail($id);
        $previousActualite = Actualite::where('id', '<', $id)
            ->orderBy('id', 'desc')
            ->first();

        $nextActualite = Actualite::where('id', '>', $id)
            ->orderBy('id', 'asc')
            ->first();

        return view('actualite-detail', compact('actualite', 'previousActualite', 'nextActualite'));
    }

    /**
     * Obtenir l'icône FontAwesome selon le nom du client
     */
    private function getClientIcon($clientName)
    {
        $name = strtolower($clientName);

        if (str_contains($name, 'hôpital') || str_contains($name, 'hopital') || str_contains($name, 'hospital')) {
            return 'fa-hospital';
        } elseif (str_contains($name, 'pharmacie') || str_contains($name, 'pharmacy')) {
            return 'fa-pills';
        } elseif (str_contains($name, 'laboratoire') || str_contains($name, 'labo')) {
            return 'fa-flask';
        } elseif (str_contains($name, 'clinique') || str_contains($name, 'clinic')) {
            return 'fa-clinic-medical';
        } elseif (str_contains($name, 'fabricant') || str_contains($name, 'industrie')) {
            return 'fa-industry';
        } elseif (str_contains($name, 'grossiste') || str_contains($name, 'distribution')) {
            return 'fa-warehouse';
        } elseif (str_contains($name, 'importateur')) {
            return 'fa-shipping-fast';
        } else {
            return 'fa-building'; // Icône par défaut
        }
    }
}
