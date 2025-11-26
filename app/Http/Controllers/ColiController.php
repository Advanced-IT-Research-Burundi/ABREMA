<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColiStoreRequest;
use App\Models\Colis;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ColiController extends Controller
{
    public function index()
    {
        $colis = Colis::with('user')->latest()->paginate(15);
        
        $total = Colis::count();
        $pending = Colis::whereNull('user_id')->count();
        $processed = Colis::whereNotNull('user_id')->count();
        
        return view('admin.colis.index', compact('colis', 'total', 'pending', 'processed'));
    }

    public function create()
    {
        $users = User::all();
        
        return view('admin.colis.create', compact('users'));
    }

    public function store(ColiStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('pathfile')) {
            $file = $request->file('pathfile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['pathfile'] = $file->storeAs('colis', $filename, 'public');
        }

        Colis::create($data);

        return redirect()
            ->route('admin.colis.index')
            ->with('success', 'Colis ajouté avec succès');
    }

    public function show($id)
    {
        $colis = Colis::with('user')->findOrFail($id);
        
        return view('admin.colis.show', compact('colis'));
    }

    public function edit($id)
    {
        $colis = Colis::findOrFail($id);
        $users = User::all();
        
        return view('admin.colis.edit', compact('colis', 'users'));
    }

    public function update(ColiStoreRequest $request, $id)
    {
        $colis = Colis::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('pathfile')) {
            if ($colis->pathfile && Storage::disk('public')->exists($colis->pathfile)) {
                Storage::disk('public')->delete($colis->pathfile);
            }

            $file = $request->file('pathfile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['pathfile'] = $file->storeAs('colis', $filename, 'public');
        }

        $colis->update($data);

        return redirect()
            ->route('admin.colis.index')
            ->with('success', 'Colis modifié avec succès');
    }

    public function destroy($id)
    {
        $colis = Colis::findOrFail($id);
        
        if ($colis->pathfile && Storage::disk('public')->exists($colis->pathfile)) {
            Storage::disk('public')->delete($colis->pathfile);
        }

        $colis->delete();

        return redirect()
            ->route('admin.colis.index')
            ->with('success', 'Colis supprimé avec succès');
    }
}