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
        public function create()
    {
        return view('service.colis');
    }

    public function store(ColiStoreRequest $request)
    {
        $data = $request->validated();

        // Associer le colis à l'utilisateur connecté
        $data['user_id'] = Auth::id();

        Colis::create($data);

        return redirect()->back()->with('success', 'Colis soumis avec succès !');
    }

}