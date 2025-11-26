<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColiStoreRequest;
use App\Http\Requests\ColiUpdateRequest;
use App\Models\Colis;

class ColisController extends Controller
{
    public function index()
    {
        // Liste paginée
        $colis = Colis::paginate(10);

        return view('admin.colis.index', compact('colis'));
    }

    public function create()
    {
        return view('admin.colis.create');
    }

    public function store(ColiStoreRequest $request)
    {
        Colis::create($request->validated());

        return redirect()
            ->route('admin.colis.index')
            ->with('success', 'Colis ajouté avec succès');
    }

    public function show(Colis $colis)
    {
        return view('admin.colis.show', compact('colis'));
    }

    public function edit(Colis $colis)
    {
        return view('admin.colis.edit', compact('colis'));
    }

    public function update(ColiUpdateRequest $request, Colis $colis)
    {
        $colis->update($request->validated());

        return redirect()
            ->route('admin.colis.index')
            ->with('success', 'Colis modifié avec succès');
    }

    public function destroy(Colis $colis)
    {
        $colis->delete();

        return redirect()
            ->route('admin.colis.index')
            ->with('success', 'Colis supprimé avec succès');
    }
}
