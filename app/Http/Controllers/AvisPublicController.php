<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvisPublicStoreRequest;
use App\Http\Requests\AvisPublicUpdateRequest;
use App\Http\Resources\AvisPublicCollection;
use App\Http\Resources\AvisPublicResource;
use App\Models\AvisPublic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AvisPublicController extends Controller
{
    public function index(Request $request)
    {
        $avisPublics = AvisPublic::all();

        return new AvisPublicCollection($avisPublics);
    }

    public function store(AvisPublicStoreRequest $request)
    {
        $avisPublic = AvisPublic::create($request->validated());

        return new AvisPublicResource($avisPublic);
    }

    public function show(Request $request, AvisPublic $avisPublic)
    {
        return new AvisPublicResource($avisPublic);
    }

    public function update(AvisPublicUpdateRequest $request, AvisPublic $avisPublic)
    {
        $avisPublic->update($request->validated());

        return new AvisPublicResource($avisPublic);
    }

    public function destroy(Request $request, AvisPublic $avisPublic)
    {
        $avisPublic->delete();

        return response()->noContent();
    }
}
