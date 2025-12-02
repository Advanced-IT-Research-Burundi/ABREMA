<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();

        // Filtres
        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%")
                ->orWhere('description', 'like', "%{$request->search}%");
        }

        // Pagination
        $clients = $query->latest()->paginate(12);

        // Statistiques
        $stats = [
            'total'        => Client::count(),
            'ce_mois'      => Client::whereMonth('created_at', now()->month)->count(),
            'avec_images'  => Client::whereNotNull('image')->count(),
        ];
        return view('admin.clients.index', compact('clients', 'stats'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }
    public function store(ClientStoreRequest $request)
    {
        $data = $request->validated();
        
        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('clients', 'public');
        }

        // Ajouter l'user_id
        // $data['user_id'] = auth()->id();

        Client::create($data);

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Actualité ajoutée avec succès');
    }
    public function update(ClientStoreRequest $request, Client $client)
    {
        $data = $request->validated();

        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('clients', 'public');
        }

        $client->update($data);

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client mis à jour avec succès');
    }
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client supprimé avec succès');
    }
}
