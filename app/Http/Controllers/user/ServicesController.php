<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvisPublic;

class ServicesController extends Controller
{
    public function colis()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();

        //recuperer le formulaire d'inspection le plus récent
        $formulaireInspection = \App\Models\FormulaireInspection::latest()->first();
        return view('service.colis', compact('avisPublics', 'formulaireInspection'));
    }
}
