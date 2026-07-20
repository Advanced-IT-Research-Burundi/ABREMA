<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvisPublic;

use App\Models\TexteReglementaire;

class VigilanceController extends Controller
{
    public function delegue()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('vigilance.delegue', compact('avisPublics'));
    }
    public function notificationES()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('vigilance.notificationES', compact('avisPublics'));
    }
    public function rappel()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('vigilance.rappelproduit', compact('avisPublics'));
    }
    public function signalement()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('vigilance.signalement', compact('avisPublics'));
    }
    public function texte()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        $textes = TexteReglementaire::where('category', TexteReglementaire::CAT_VIGILANCE)->latest()->get();
        return view('vigilance.texte', compact('avisPublics', 'textes'));
    }
}
