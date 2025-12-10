<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ColiStoreRequest;
use App\Mail\abremamail;
use App\Models\Colis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ColisController extends Controller
{
    public function index()
    {
        $colis = Colis::latest()->paginate(10);
        return view('admin.colis.index', compact('colis'));
    }

    public function store(ColiStoreRequest $request)
    {
        $colis = $request->validated();

        $colis['user_id'] = Auth::id();

        $pathfile = $request->file('pathfile')->store('colis-files', 'public');

        $colis['pathfile'] = $pathfile;
        Colis::create($colis);

        Mail::to('mnikezwe@gmail.com')->send(new abremamail());

        return back()->with('success', 'Colis soumis avec succès !');
    }
}
