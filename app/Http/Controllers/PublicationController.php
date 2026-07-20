<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationStoreRequest;
use App\Http\Requests\PublicationUpdateRequest;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Afficher la liste des publications
     */
    public function index(Request $request)
    {
        $query = Publication::query();

        // Filtrage par recherche
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filtrage par auteur
        if ($request->filled('user')) {
            $query->where('user_id', $request->user);
        }

        // Filtrage par date
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $publications = $query->latest()->paginate(10);

        // Récupérer les utilisateurs pour le filtre
        $users = User::all();

        return view('admin.publication.index', compact('publications', 'users'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('admin.publication.create');
    }

    /**
     * Enregistrer une nouvelle publication
     */
    public function store(PublicationStoreRequest $request)
    {
        $data = $request->validated();

        // Optionnel : si tu veux lier l'utilisateur connecté
        // $data['user_id'] = auth()->id();

        Publication::create($data);

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication créée avec succès.');
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(Publication $publication)
    {
        return view('admin.publication.edit', compact('publication'));
    }

    /**
     * Mettre à jour la publication
     */
    public function update(PublicationUpdateRequest $request, Publication $publication)
    {
        $publication->update($request->validated());

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication mise à jour avec succès.');
    }

    /**
     * Supprimer la publication
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication supprimée avec succès.');
    }

    /**
     * Afficher le détail d'une publication (optionnel)
     */
    public function show(Publication $publication)
    {
        return view('admin.publications.show', compact('publication'));
    }
}
