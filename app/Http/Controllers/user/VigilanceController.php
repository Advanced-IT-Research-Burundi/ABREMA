<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VigilanceController extends Controller
{
    public function delegue()
    {
        return view('vigilance.delegue');
    }
    public function notificationES()
    {
        return view('vigilance.notificationES');
    }
    public function rappel()
    {
        return view('vigilance.rappelproduit');
    }
    public function signalement()
    {
        return view('vigilance.signalement');
    }
    public function texte()
    {
        return view('vigilance.texte');
    }
}
