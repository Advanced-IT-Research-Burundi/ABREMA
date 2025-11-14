<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('abrema');
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
