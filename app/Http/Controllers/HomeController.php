<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Partenaire;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $actualites =Actualite::latest()->take(3)->get();
        $partenaires =Partenaire::latest()->get();
        return view('web.index', compact('actualites', 'partenaires'));
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
}
