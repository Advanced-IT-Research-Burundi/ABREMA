<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColiStoreRequest;
use App\Models\Colis;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ColiController extends Controller
{
    public function index()
    {
        return view('service.colis');
    }

    public function store(ColiStoreRequest $request)
    {
        $colis = $request->validated();

        // Associer le colis à l'utilisateur connecté
        $colis['user_id'] = Auth::id();

        Colis::create($colis);

        return redirect()->route('colis.store', $colis)
            ->with('success', 'Colis soumis avec succès !');
    }
}
