<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaboController extends Controller
{
    public function aboutlabo()
    {
        return view('labocontrol.aboutlabo');
    }
    public function servicelabo()
    {
        return view('labocontrol.servicelabo');
    }
}
