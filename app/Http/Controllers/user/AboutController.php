<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipeDirection;

class AboutController extends Controller
{
    public function equipe()
    {
        $equipe =EquipeDirection::all();
        return view('about.equipe', compact('equipe'));
    }

    public function fonction()
    {
        return view('about.fonction');
    }

    public function organigramme()
    {
        return view('about.organigramme');
    }

    public function profilabrema()
    {
        return view('about.profilabrema');
    }
    public function qms()
    {
        return view('about.qms');
    }
}
