<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipeDirection;
use App\Models\AvisPublic;

class AboutController extends Controller
{
    public function equipe()
    {   
        $avisPublics = AvisPublic::latest()->take(5)->get();
        $membres = EquipeDirection::latest()->get();
        return view('about.equipe', compact('membres','avisPublics'));
    }

    public function fonction()
    {
         $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('about.fonction', compact('avisPublics'));
    }

    public function organigramme()
    {
         $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('about.organigramme', compact('avisPublics'));
    }


    public function profilAbrema()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('about.profilabrema', compact('avisPublics'));
    }
    public function qms()
    {
         $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('about.qms', compact('avisPublics'));
    }
}
