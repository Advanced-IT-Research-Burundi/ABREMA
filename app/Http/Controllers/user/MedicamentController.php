<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
        return view('medicament.produits');
    }
}
