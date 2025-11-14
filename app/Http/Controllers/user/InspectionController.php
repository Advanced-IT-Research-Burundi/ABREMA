<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    public function etablissement()
    {
        return view('inspection.etablissement');
    }
    public function GDP()
    {
        return view('inspection.GDP');
    }
    public function GMP()
    {
        return view('inspection.GMP');

    }
}
