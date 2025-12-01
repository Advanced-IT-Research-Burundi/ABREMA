<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipeDirectionStoreRequest;
use App\Models\EquipeDirection;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EquipeDirectionController extends Controller
{
    /**
     * Liste des membres
     */
    public function index()
    {
        $membres = EquipeDirection::with('user')->latest()->paginate(10);
        return view('admin.equipe.index', compact('membres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.equipe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipeDirectionStoreRequest $request)
    {
        $data = $request->validated();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('equipe-directions', 'public');
        }

        $data['user_id'] = auth()->id();

        EquipeDirection::create($data);

        return redirect()
            ->route('admin.equipe-directions.index')
            ->with('success', 'Membre de l\'équipe ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipeDirection $equipeDirection)
    {
        return view('admin.equipe.show', compact('equipeDirection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipeDirection $equipeDirection)
    {
        return view('admin.equipe.edit', compact('equipeDirection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipeDirectionStoreRequest $request, EquipeDirection $equipeDirection)
    {
        $data = $request->validated();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($equipeDirection->photo) {
                Storage::disk('public')->delete($equipeDirection->photo);
            }
            $data['photo'] = $request->file('photo')->store('equipe-directions', 'public');
        }

        $equipeDirection->update($data);

        return redirect()
            ->route('admin.equipe-directions.index')
            ->with('success', 'Membre de l\'équipe modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipeDirection $equipeDirection)
    {
        // Delete photo
        if ($equipeDirection->photo) {
            Storage::disk('public')->delete($equipeDirection->photo);
        }

        $equipeDirection->delete();

        return redirect()
            ->route('admin.equipe-directions.index')
            ->with('success', 'Membre de l\'équipe supprimé avec succès.');
    }
}
