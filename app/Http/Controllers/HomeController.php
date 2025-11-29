<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.index');
    }
    public function actualite()
    {
        return view('information.actualite');
    }
    public function evenement()
    {
        return view('information.evenement');
    }
    public function document()
    {
        return view('information.document');
    }
}
