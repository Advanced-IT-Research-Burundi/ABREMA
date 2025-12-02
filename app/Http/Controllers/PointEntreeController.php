<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PointEntreeStoreRequest;
use App\Models\PointEntree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PointEntreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pointEntrees = PointEntree::with('user')->latest()->paginate(15);
        return view('admin.points.index', compact('pointEntrees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.points.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PointEntreeStoreRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('point-entrees', 'public');
        }

        $data['user_id'] = auth()->id();

        PointEntree::create($data);

        return redirect()
            ->route('admin.point-entrees.index')
            ->with('success', 'Point d\'entrée ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PointEntree $pointEntree)
    {
        return view('admin.points.show', compact('pointEntree'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PointEntree $pointEntree)
    {
        return view('admin.points.edit', compact('pointEntree'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PointEntreeStoreRequest $request, PointEntree $pointEntree)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($pointEntree->image) {
                Storage::disk('public')->delete($pointEntree->image);
            }
            $data['image'] = $request->file('image')->store('point-entrees', 'public');
        }

        $pointEntree->update($data);

        return redirect()
            ->route('admin.point-entrees.index')
            ->with('success', 'Point d\'entrée modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PointEntree $pointEntree)
    {
        // Delete image
        if ($pointEntree->image) {
            Storage::disk('public')->delete($pointEntree->image);
        }

        $pointEntree->delete();

        return redirect()
            ->route('admin.point-entrees.index')
            ->with('success', 'Point d\'entrée supprimé avec succès.');
    }
}