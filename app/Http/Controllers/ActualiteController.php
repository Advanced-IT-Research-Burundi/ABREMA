<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitStoreRequest;
use App\Http\Requests\ProduitUpdateRequest;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    public function index()
    {
        $Actualites = Actualite::paginate(10);
        
        return view('admin.Actualite.index', compact('Actualites'));
    }

    public function create()
    {
        return view('admin.Actualite.create');
    }

    public function store(ProduitStoreRequest $request)
    {
        Actualite::create($request->validated());

        return redirect()
            ->route('admin.Actualites.index')
            ->with('success', 'Actualite ajouté avec succès');
    }

    public function show(Actualite $Actualite)
    {
        return view('admin.Actualite.show', compact('Actualite'));
    }

    public function edit(Actualite $Actualite)
    {
        return view('admin.Actualite.edit', compact('Actualite'));
    }

    public function update(ProduitUpdateRequest $request, Actualite $Actualite)
    {
        $Actualite->update($request->validated());

        return redirect()
            ->route('admin.Actualite.index')
            ->with('success', 'Actualite modifié avec succès');
    }

    public function destroy(Actualite $Actualite)
    {
        $Actualite->delete();

        return redirect()
            ->route('admin.Actualite.index')
            ->with('success', 'Actualite supprimé avec succès');
    }
}
