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
        
        return view('service.colis');
    }

    public function store(ColiStoreRequest $request)
    {
        $colis = $request->validated();

        $colis['user_id'] = Auth::id();

        Colis::create($colis);

        Mail::to('mnikezwe@gmail.com')->send(new abremamail());

        return redirect()->route('colis.store', $colis)
            ->with('success', 'Colis soumis avec succès !');
    }
}
