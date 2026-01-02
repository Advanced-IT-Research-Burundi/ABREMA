<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipeDirectionStoreRequest;
use App\Models\EquipeDirection;
use Illuminate\Support\Facades\Storage;

class EquipeDirectionController extends Controller
{
    /**
     * Liste des membres
     */
    public function index()
    {
        $equipe = EquipeDirection::latest()->paginate(10);
        return view('admin.equipe.index', compact('equipe'));
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
            // $data['photo'] = $request->file('photo')->store('equipe-directions', 'public');
            // use move uppload file 
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/equipe-directions'), $filename);
            $data['photo'] = 'equipe-directions/' . $filename;
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
    public function show(EquipeDirection $equipe)
    {
        return view('admin.equipe.show', compact('equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipeDirection $equipe)
    {
        return view('admin.equipe.edit', compact('equipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipeDirectionStoreRequest $request, EquipeDirection $equipe)
    {
        $data = $request->validated();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($equipe->photo) {
                Storage::disk('public')->delete($equipe->photo);
            }
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/equipe-directions'), $filename);
            $data['photo'] = 'equipe-directions/' . $filename;  
        }

        $equipe->update($data);

        return redirect()
            ->route('admin.equipe-directions.index')
            ->with('success', 'Membre de l\'équipe modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipeDirection $equipe)
    {
        // Delete photo
        if ($equipe->photo) {
            Storage::disk('public')->delete($equipe->photo);
        }

        $equipe->delete();

        return redirect()
            ->route('admin.equipe-directions.index')
            ->with('success', 'Membre de l\'équipe supprimé avec succès.');
    }
}
