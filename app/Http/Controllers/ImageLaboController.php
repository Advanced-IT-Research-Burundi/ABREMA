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
    public function index(Request $request)
    {
        $imageLabos = ImageLabo::all();

        return new ImageLaboCollection($imageLabos);
    }

    public function store(ImageLaboStoreRequest $request)
    {
        $imageLabo = ImageLabo::create($request->validated());

        return new ImageLaboResource($imageLabo);
    }

    public function show(Request $request, ImageLabo $imageLabo)
    {
        return new ImageLaboResource($imageLabo);
    }

    public function update(ImageLaboUpdateRequest $request, ImageLabo $imageLabo)
    {
        $imageLabo->update($request->validated());

        return new ImageLaboResource($imageLabo);
    }

    public function destroy(Request $request, ImageLabo $imageLabo)
    {
        $imageLabo->delete();

        return response()->noContent();
    }
}
