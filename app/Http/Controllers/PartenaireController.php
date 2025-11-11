<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartenaireStoreRequest;
use App\Http\Requests\PartenaireUpdateRequest;
use App\Http\Resources\PartenaireCollection;
use App\Http\Resources\PartenaireResource;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PartenaireController extends Controller
{
    public function index(Request $request): Response
    {
        $partenaires = Partenaire::all();

        return new PartenaireCollection($partenaires);
    }

    public function store(PartenaireStoreRequest $request): Response
    {
        $partenaire = Partenaire::create($request->validated());

        return new PartenaireResource($partenaire);
    }

    public function show(Request $request, Partenaire $partenaire): Response
    {
        return new PartenaireResource($partenaire);
    }

    public function update(PartenaireUpdateRequest $request, Partenaire $partenaire): Response
    {
        $partenaire->update($request->validated());

        return new PartenaireResource($partenaire);
    }

    public function destroy(Request $request, Partenaire $partenaire): Response
    {
        $partenaire->delete();

        return response()->noContent();
    }
}
