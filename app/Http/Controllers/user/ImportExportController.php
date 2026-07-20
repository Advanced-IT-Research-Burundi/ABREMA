<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvisPublic;

use App\Models\TexteReglementaire;

class ImportExportController extends Controller
{
    public function demande()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('importexport.demande', compact('avisPublics'));
    }
    public function pointentree()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('importexport.pointentree', compact('avisPublics'));
    }
    public function texteimport()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        $textes = TexteReglementaire::where('category', TexteReglementaire::CAT_IMPORT_EXPORT)->latest()->get();
        return view('importexport.texte', compact('avisPublics', 'textes'));
    }
}
