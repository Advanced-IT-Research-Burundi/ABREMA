<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipeDirectionStoreRequest;
use App\Http\Requests\EquipeDirectionUpdateRequest;
use App\Http\Resources\EquipeDirectionCollection;
use App\Http\Resources\EquipeDirectionResource;
use App\Models\EquipeDirection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EquipeDirectionController extends Controller
{
    public function index(Request $request): Response
    {
        $equipeDirections = EquipeDirection::all();

        return new EquipeDirectionCollection($equipeDirections);
    }

    public function store(EquipeDirectionStoreRequest $request): Response
    {
        $equipeDirection = EquipeDirection::create($request->validated());

        return new EquipeDirectionResource($equipeDirection);
    }

    public function show(Request $request, EquipeDirection $equipeDirection): Response
    {
        return new EquipeDirectionResource($equipeDirection);
    }

    public function update(EquipeDirectionUpdateRequest $request, EquipeDirection $equipeDirection): Response
    {
        $equipeDirection->update($request->validated());

        return new EquipeDirectionResource($equipeDirection);
    }

    public function destroy(Request $request, EquipeDirection $equipeDirection): Response
    {
        $equipeDirection->delete();

        return response()->noContent();
    }
}
