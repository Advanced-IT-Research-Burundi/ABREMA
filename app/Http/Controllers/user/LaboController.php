<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvisPublic;

class LaboController extends Controller
{
    public function aboutlabo()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('labocontrol.aboutlabo', compact('avisPublics'));
    }
    public function servicelabo()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('labocontrol.servicelabo', compact('avisPublics'));
    }
}
