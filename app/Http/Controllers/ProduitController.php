<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitStoreRequest;
use App\Http\Requests\ProduitUpdateRequest;
use App\Http\Resources\ProduitCollection;
use App\Http\Resources\ProduitResource;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProduitController extends Controller
{
    public function index(Request $request): Response
    {
        $produits = Produit::all();

        return new ProduitCollection($produits);
    }

    public function store(ProduitStoreRequest $request): Response
    {
        $produit = Produit::create($request->validated());

        return new ProduitResource($produit);
    }

    public function show(Request $request, Produit $produit): Response
    {
        return new ProduitResource($produit);
    }

    public function update(ProduitUpdateRequest $request, Produit $produit): Response
    {
        $produit->update($request->validated());

        return new ProduitResource($produit);
    }

    public function destroy(Request $request, Produit $produit): Response
    {
        $produit->delete();

        return response()->noContent();
    }
}
