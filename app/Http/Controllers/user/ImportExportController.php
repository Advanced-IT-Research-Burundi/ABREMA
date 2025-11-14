<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    public function demande()
    {
        return view('ImportExport.demande');
    }
    public function pointentree()
    {
        return view('ImportExport.pointentree');
    }
    public function texteimport()
    {
        return view('ImportExport.texte');
    }
}
