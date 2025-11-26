<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function notification()
    {
        return view('medicament.notifications');
    }
    public function textemedicament()
    {
        return view('medicament.texte');
    }
    public function produit()
    {
        $produits = Produit::latest()->latest()->get();

        return view('medicament.produits', compact('produits'));
    }
}
