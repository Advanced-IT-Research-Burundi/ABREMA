<?php

namespace App\Http\Controllers;

use App\Http\Requests\TexteReglementaireStoreRequest;
use App\Http\Requests\TexteReglementaireUpdateRequest;
use App\Models\TexteReglementaire;
use App\Models\User;
use Illuminate\Http\Request;

class TexteReglementaireController extends Controller
{
    /**
     * Afficher la liste des textes réglementaires
     */
    public function index(Request $request)
    {
        $query = TexteReglementaire::query();

        // Filtrage par titre
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filtrage par auteur
        if ($request->filled('user')) {
            $query->where('user_id', $request->user);
        }

        $texteReglementaires = $query->latest()->paginate(10);

        // Pour le filtre auteur
        $users = User::all();

        return view('admin.texte.index', compact('texteReglementaires', 'users'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('admin.texte.create');
    }

    /**
     * Enregistrer un nouveau texte réglementaire
     */
    public function store(TexteReglementaireStoreRequest $request)
    {
        $data = $request->validated();

        // Gestion de l'upload du fichier
        if ($request->hasFile('pathfile')) {
            $data['pathfile'] = $request->file('pathfile')->store('texte_reglementaires', 'public');
        }

        TexteReglementaire::create($data);

        return redirect()->route('admin.texte-reglementaires.index')
            ->with('success', 'Texte réglementaire créé avec succès.');
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(TexteReglementaire $texteReglementaire)
    {
        return view('admin.texte.edit', compact('texteReglementaire'));
    }

    /**
     * Mettre à jour le texte réglementaire
     */
    public function update(TexteReglementaireUpdateRequest $request, TexteReglementaire $texteReglementaire)
    {
        $data = $request->validated();

        if ($request->hasFile('pathfile')) {
            $data['pathfile'] = $request->file('pathfile')->store('texte_reglementaires', 'public');
        }

        $texteReglementaire->update($data);

        return redirect()->route('admin.texte-reglementaires.index')
            ->with('success', 'Texte réglementaire mis à jour avec succès.');
    }

    /**
     * Supprimer le texte réglementaire
     */
    public function destroy(TexteReglementaire $texteReglementaire)
    {
        $texteReglementaire->delete();

        return redirect()->route('admin.textereglementaires.index')
            ->with('success', 'Texte réglementaire supprimé avec succès.');
    }

    /**
     * Afficher le détail (optionnel)
     */
    public function show(TexteReglementaire $texteReglementaire)
    {
        return view('admin.texte_reglementaires.show', compact('texteReglementaire'));
    }
}
