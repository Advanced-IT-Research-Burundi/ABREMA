<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvisPublicStoreRequest;
use App\Models\AvisPublic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvisPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avisPublics = AvisPublic::with('user')->latest()->paginate(15);
        return view('admin.avis.index', compact('avisPublics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.avis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AvisPublicStoreRequest $request)
    {
        $data = $request->validated();

        // Handle file upload
        if ($request->hasFile('contenu')) {
            $data['contenu'] = $request->file('contenu')->store('avis-publics', 'public');
        }

        $data['user_id'] = auth()->id();

        AvisPublic::create($data);

        return redirect()
            ->route('admin.avis-publics.index')
            ->with('success', 'Avis public ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AvisPublic $avisPublic)
    {
        return view('admin.avis.show', compact('avisPublic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AvisPublic $avisPublic)
    {
        return view('admin.avis.edit', compact('avisPublic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AvisPublicStoreRequest $request, AvisPublic $avisPublic)
    {
        $data = $request->validated();

        // Handle file upload
        if ($request->hasFile('contenu')) {
            // Delete old file
            if ($avisPublic->contenu) {
                Storage::disk('public')->delete($avisPublic->contenu);
            }
            $data['contenu'] = $request->file('contenu')->store('avis-publics', 'public');
        }

        $avisPublic->update($data);

        return redirect()
            ->route('admin.avis-publics.index')
            ->with('success', 'Avis public modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AvisPublic $avisPublic)
    {
        // Delete file
        if ($avisPublic->contenu) {
            Storage::disk('public')->delete($avisPublic->contenu);
        }

        $avisPublic->delete();

        return redirect()
            ->route('admin.avis-publics.index')
            ->with('success', 'Avis public supprimé avec succès.');
    }
}