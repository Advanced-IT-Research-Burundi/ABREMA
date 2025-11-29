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
        $equipes = EquipeDirection::paginate(10);

        return view('admin.equipe.index', compact('equipes'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        $users = User::all();

        return view('admin.equipe.create', compact('users'));
    }

    /**
     * Enregistrement d’un membre
     */
    public function store(EquipeDirectionStoreRequest $request)
    {
        $data = $request->validated();

        // Upload de la photo
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('equipe', 'public');
        }

        EquipeDirection::create($data);

        return redirect()
            ->route('admin.equipe-directions.index')
            ->with('success', 'Membre ajouté avec succès');
    }

    /**
     * Affichage d’un membre
     */
    public function show(EquipeDirection $equipe_direction)
    {
        return view('admin.equipe.show', compact('equipe_direction'));
    }

    /**
     * Formulaire d’édition
     */
    public function edit(EquipeDirection $equipe_direction)
    {
        $users = User::all();

        return view('admin.equipe.edit', compact('equipe_direction', 'users'));
    }

    /**
     * Mise à jour d’un membre
     */
    public function update(EquipeDirectionStoreRequest $request, EquipeDirection $equipe_direction)
    {
        $data = $request->validated();

        // Mise à jour de la photo si nouvelle image
        if ($request->hasFile('photo')) {

            // Suppression de l’ancienne image
            if ($equipe_direction->photo && Storage::disk('public')->exists($equipe_direction->photo)) {
                Storage::disk('public')->delete($equipe_direction->photo);
            }

            $data['photo'] = $request->file('photo')->store('equipe', 'public');
        }

        $equipe_direction->update($data);

        return redirect()
            ->route('admin.equipe-directions.index')
            ->with('success', 'Membre modifié avec succès');
    }

    /**
     * Suppression d’un membre
     */
    public function destroy(EquipeDirection $equipe_direction)
    {
        // Supprimer la photo associée
        if ($equipe_direction->photo && Storage::disk('public')->exists($equipe_direction->photo)) {
            Storage::disk('public')->delete($equipe_direction->photo);
        }

        $equipe_direction->delete();

        return redirect()
            ->route('admin.equipe-directions.index')
            ->with('success', 'Membre supprimé avec succès');
    }
}
