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
    public function index(Request $request): Response
    {
        $texteReglementaires = TexteReglementaire::all();

        return new TexteReglementaireCollection($texteReglementaires);
    }

    public function store(TexteReglementaireStoreRequest $request): Response
    {
        $texteReglementaire = TexteReglementaire::create($request->validated());

        return new TexteReglementaireResource($texteReglementaire);
    }

    public function show(Request $request, TexteReglementaire $texteReglementaire): Response
    {
        return new TexteReglementaireResource($texteReglementaire);
    }

    public function update(TexteReglementaireUpdateRequest $request, TexteReglementaire $texteReglementaire): Response
    {
        $texteReglementaire->update($request->validated());

        return new TexteReglementaireResource($texteReglementaire);
    }

    public function destroy(Request $request, TexteReglementaire $texteReglementaire): Response
    {
        $texteReglementaire->delete();

        return response()->noContent();
    }
}
