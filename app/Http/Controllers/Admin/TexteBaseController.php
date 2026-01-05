<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TexteReglementaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

abstract class TexteBaseController extends Controller
{
    protected $category;
    protected $viewPath = 'admin.texte';
    protected $routeName;
    protected $title;

    public function index(Request $request)
    {
        $query = TexteReglementaire::where('category', $this->category);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('user')) {
            $query->where('user_id', $request->user);
        }

        $items = $query->latest()->paginate(10)->withQueryString();
        $users = User::all();
        $title = $this->title;
        $routeName = $this->routeName;

        return view($this->viewPath . '.index', compact('items', 'users', 'title', 'routeName'));
    }

    public function create()
    {
        $title = $this->title;
        $routeName = $this->routeName;
        return view($this->viewPath . '.create', compact('title', 'routeName'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'pathfile' => 'required|file|mimes:pdf,doc,docx|max:51200',
        ]);

        $data['category'] = $this->category;
        
        if ($request->hasFile('pathfile')) {
            $data['pathfile'] = $request->file('pathfile')->store('texte_reglementaires', 'public');
        }

        TexteReglementaire::create($data);

        return redirect()->route($this->routeName . '.index')
            ->with('success', 'Texte créé avec succès.');
    }

    public function edit($id)
    {
        $item = TexteReglementaire::findOrFail($id);
        $title = $this->title;
        $routeName = $this->routeName;
        return view($this->viewPath . '.edit', compact('item', 'title', 'routeName'));
    }

    public function update(Request $request, $id)
    {
        $item = TexteReglementaire::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'pathfile' => 'nullable|file|mimes:pdf,doc,docx|max:51200',
        ]);

        if ($request->hasFile('pathfile')) {
            if ($item->pathfile) {
                Storage::disk('public')->delete($item->pathfile);
            }
            $data['pathfile'] = $request->file('pathfile')->store('texte_reglementaires', 'public');
        }

        $item->update($data);

        return redirect()->route($this->routeName . '.index')
            ->with('success', 'Texte mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $item = TexteReglementaire::findOrFail($id);
        if ($item->pathfile) {
            Storage::disk('public')->delete($item->pathfile);
        }
        $item->delete();

        return redirect()->route($this->routeName . '.index')
            ->with('success', 'Texte supprimé avec succès.');
    }
}
