<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointEntreeStoreRequest;
use App\Http\Requests\PointEntreeUpdateRequest;
use App\Http\Resources\PointEntreeCollection;
use App\Http\Resources\PointEntreeResource;
use App\Models\PointEntree;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PointEntreeController extends Controller
{
    public function index(Request $request)
    {
        $pointEntrees = PointEntree::all();

        return new PointEntreeCollection($pointEntrees);
    }

    public function store(PointEntreeStoreRequest $request)
    {
        $pointEntree = PointEntree::create($request->validated());

        return new PointEntreeResource($pointEntree);
    }

    public function show(Request $request, PointEntree $pointEntree)
    {
        return new PointEntreeResource($pointEntree);
    }

    public function update(PointEntreeUpdateRequest $request, PointEntree $pointEntree)
    {
        $pointEntree->update($request->validated());

        return new PointEntreeResource($pointEntree);
    }

    public function destroy(Request $request, PointEntree $pointEntree)
    {
        $pointEntree->delete();

        return response()->noContent();
    }
}
