<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualiteStoreRequest;
use App\Http\Requests\ActualiteUpdateRequest;
use App\Models\Actualite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActualiteController extends Controller
{
    public function index(Request $request)
    {
        $query = Actualite::with('user')->latest();
        // Filtres
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $actualites = $query->paginate(12);

        // Stats pour les cartes
        $stats = [
            'ce_mois' => Actualite::whereMonth('created_at', now()->month)
                                  ->whereYear('created_at', now()->year)
                                  ->count(),
            'auteurs' => Actualite::distinct('user_id')->count('user_id'),
            'avec_images' => Actualite::whereNotNull('image')->count(),
        ];

        // Liste des utilisateurs pour le filtre
        $users = User::has('actualites')->get();

        return view('admin.actualites.index', compact('actualites', 'stats', 'users'));
    }

    public function create()
    {
        return view('admin.actualites.create');
    }

    public function store(ActualiteStoreRequest $request)
    {
        $data = $request->validated();
        
        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            /* $data['image'] = $request->file('image')->store('actualites', 'public'); */
            // use move upload file instead of store
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/actualites'), $filename);
            $data['image'] = 'actualites/' . $filename;
        }

        // Ajouter l'user_id
        $data['user_id'] = auth()->id();

        Actualite::create($data);

        return redirect()
            ->route('admin.actualites.index')
            ->with('success', 'Actualité ajoutée avec succès');
    }

    public function show(Actualite $actualite)
    {
        $actualite->load('user');
        return view('admin.actualites.show', compact('actualite'));
    }

    public function edit(Actualite $actualite)
    {
        return view('admin.actualites.edit', compact('actualite'));
    }

    public function update(ActualiteUpdateRequest $request, Actualite $actualite)
    {
        $data = $request->validated();
        
        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            // utilse mov uppload file 

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/actualites'), $filename);
            $data['image'] = 'actualites/' . $filename;
        }

        $actualite->update($data);

        return redirect()
            ->route('admin.actualites.index')
            ->with('success', 'Actualité modifiée avec succès');
    }

    public function destroy(Actualite $actualite)
    {
        // Supprimer l'image si elle existe
        if ($actualite->image && Storage::disk('public')->exists($actualite->image)) {
            Storage::disk('public')->delete($actualite->image);
        }

        $actualite->delete();

        return redirect()
            ->route('admin.actualites.index')
            ->with('success', 'Actualité supprimée avec succès');
    }
}