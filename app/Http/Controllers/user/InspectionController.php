<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvisPublic;

class InspectionController extends Controller
{
    public function etablissement()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('inspection.etablissement', compact('avisPublics'));
    }
    public function GDP()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('inspection.GDP', compact('avisPublics'));
    }
    public function GMP()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('inspection.GMP', compact('avisPublics'));

    }
}
