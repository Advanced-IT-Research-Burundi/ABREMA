<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartenaireStoreRequest;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partenaires = Partenaire::with('user')->latest()->paginate(12)->withQueryString();
        return view('admin.partenaires.index', compact('partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partenaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartenaireStoreRequest $request)
    {
        $data = $request->validated();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('partenaires', 'public');
        }

        $data['user_id'] = auth()->id();

        Partenaire::create($data);

        return redirect()
            ->route('admin.partenaires.index')
            ->with('success', 'Partenaire ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partenaire $partenaire)
    {
        return view('admin.partenaires.show', compact('partenaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partenaire $partenaire)
    {
        return view('admin.partenaires.edit', compact('partenaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartenaireStoreRequest $request, Partenaire $partenaire)
    {
        $data = $request->validated();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partenaire->logo) {
                Storage::disk('public')->delete($partenaire->logo);
            }
            $data['logo'] = $request->file('logo')->store('partenaires', 'public');
        }

        $partenaire->update($data);

        return redirect()
            ->route('admin.partenaires.index')
            ->with('success', 'Partenaire modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partenaire $partenaire)
    {
        // Delete logo
        if ($partenaire->logo) {
            Storage::disk('public')->delete($partenaire->logo);
        }

        $partenaire->delete();

        return redirect()
            ->route('admin.partenaires.index')
            ->with('success', 'Partenaire supprimé avec succès.');
    }
}