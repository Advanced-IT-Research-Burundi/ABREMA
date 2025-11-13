<?php

namespace App\Http\Controllers;

use App\Http\Requests\TexteReglementaireStoreRequest;
use App\Http\Requests\TexteReglementaireUpdateRequest;
use App\Http\Resources\TexteReglementaireCollection;
use App\Http\Resources\TexteReglementaireResource;
use App\Models\TexteReglementaire;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TexteReglementaireController extends Controller
{
    public function index(Request $request)
    {
        $texteReglementaires = TexteReglementaire::all();

        return new TexteReglementaireCollection($texteReglementaires);
    }

    public function store(TexteReglementaireStoreRequest $request)
    {
        $texteReglementaire = TexteReglementaire::create($request->validated());

        return new TexteReglementaireResource($texteReglementaire);
    }

    public function show(Request $request, TexteReglementaire $texteReglementaire)
    {
        return new TexteReglementaireResource($texteReglementaire);
    }

    public function update(TexteReglementaireUpdateRequest $request, TexteReglementaire $texteReglementaire)
    {
        $texteReglementaire->update($request->validated());

        return new TexteReglementaireResource($texteReglementaire);
    }

    public function destroy(Request $request, TexteReglementaire $texteReglementaire)
    {
        $texteReglementaire->delete();

        return response()->noContent();
    }
}
