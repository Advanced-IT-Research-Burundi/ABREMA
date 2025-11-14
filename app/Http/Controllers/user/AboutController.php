<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function equipe()
    {
        return view('about.equipe');
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
