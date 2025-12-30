<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitStoreRequest;
use App\Http\Requests\ProduitUpdateRequest;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::active()->paginate(10);
        
        return view('admin.produits.index', compact('produits'));
    }

    public function create()
    {
        return view('admin.produits.create');
    }

    public function store(ProduitStoreRequest $request)
    {
        Produit::create($request->validated());

        return redirect()
            ->route('admin.produits.index')
            ->with('success', 'Produit ajouté avec succès');
    }

    public function show(Produit $produit)
    {
        return view('admin.produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        return view('admin.produits.edit', compact('produit'));
    }

    public function update(ProduitUpdateRequest $request, Produit $produit)
    {
        $produit->update($request->validated());

        return redirect()
            ->route('admin.produits.index')
            ->with('success', 'Produit modifié avec succès');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()
            ->route('admin.produits.index')
            ->with('success', 'Produit supprimé avec succès');
    }
}
