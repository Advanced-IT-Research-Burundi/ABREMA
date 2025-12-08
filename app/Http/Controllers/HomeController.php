<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Client;
use App\Models\PointEntree;

class HomeController extends Controller
{
    public function index()
    {
        $actualites = Actualite::latest()->take(3)->get();
        $partenaires = Partenaire::latest()->get();
        $clients = Client::latest()->get();
        $pointEntrees = PointEntree::latest()->get();
        return view('web.index', compact('actualites', 'partenaires', 'clients', 'pointEntrees'));
    }
    public function actualite()
    {
        return view('information.actualite');
    }
    public function evenement()
    {
        return view('information.evenement');
    }
    public function document()
    {
        return view('information.document');
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
}
