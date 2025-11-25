<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.index');
    }
    public function publication()
    {
        return view('publication');
    }
    public function avis()
    {
        return view('avis.index');
    }
}
