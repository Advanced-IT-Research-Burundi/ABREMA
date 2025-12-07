<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    public function demande()
    {
        return view('importexport.demande');
    }
    public function pointentree()
    {
        return view('importexport.pointentree');
    }
    public function texteimport()
    {
        return view('importexport.texte');
    }
}
