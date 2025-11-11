<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColiStoreRequest;
use App\Http\Requests\ColiUpdateRequest;
use App\Http\Resources\ColiCollection;
use App\Http\Resources\ColiResource;
use App\Models\Colis;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ColisController extends Controller
{
    public function index(Request $request): Response
    {
        $colis = Coli::all();

        return new ColiCollection($colis);
    }

    public function store(ColiStoreRequest $request): Response
    {
        $coli = Coli::create($request->validated());

        return new ColiResource($coli);
    }

    public function show(Request $request, Coli $coli): Response
    {
        return new ColiResource($coli);
    }

    public function update(ColiUpdateRequest $request, Coli $coli): Response
    {
        $coli->update($request->validated());

        return new ColiResource($coli);
    }

    public function destroy(Request $request, Coli $coli): Response
    {
        $coli->delete();

        return response()->noContent();
    }
}
