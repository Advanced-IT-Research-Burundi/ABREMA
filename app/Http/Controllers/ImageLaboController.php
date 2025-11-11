<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageLaboStoreRequest;
use App\Http\Requests\ImageLaboUpdateRequest;
use App\Http\Resources\ImageLaboCollection;
use App\Http\Resources\ImageLaboResource;
use App\Models\ImageLabo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageLaboController extends Controller
{
    public function index(Request $request): Response
    {
        $imageLabos = ImageLabo::all();

        return new ImageLaboCollection($imageLabos);
    }

    public function store(ImageLaboStoreRequest $request): Response
    {
        $imageLabo = ImageLabo::create($request->validated());

        return new ImageLaboResource($imageLabo);
    }

    public function show(Request $request, ImageLabo $imageLabo): Response
    {
        return new ImageLaboResource($imageLabo);
    }

    public function update(ImageLaboUpdateRequest $request, ImageLabo $imageLabo): Response
    {
        $imageLabo->update($request->validated());

        return new ImageLaboResource($imageLabo);
    }

    public function destroy(Request $request, ImageLabo $imageLabo): Response
    {
        $imageLabo->delete();

        return response()->noContent();
    }
}
