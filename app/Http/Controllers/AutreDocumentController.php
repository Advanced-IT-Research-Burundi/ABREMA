<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutreDocumentStoreRequest;
use App\Http\Requests\AutreDocumentUpdateRequest;
use App\Models\AutreDocument;
use App\Models\User;
use Illuminate\Http\Request;

class AutreDocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = AutreDocument::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('user')) {
            $query->where('user_id', $request->user);
        }

        $autresDocuments = $query->latest()->paginate(10)->withQueryString();
        $users = User::all();

        return view('admin.autres-documents.index', compact('autresDocuments', 'users'));
    }

    public function create()
    {
        return view('admin.autres-documents.create');
    }

    public function store(AutreDocumentStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('pathfile')) {
           /*  $data['pathfile'] = $request->file('pathfile')->store('autres_documents', 'public');
 */
            // Move uploaded file to a specific directory
            $file = $request->file('pathfile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/autres_documents'), $filename);
            $data['pathfile'] = 'autres_documents/' . $filename;

        }

        AutreDocument::create($data);

        return redirect()->route('admin.autres-documents.index')
            ->with('success', 'Document créé avec succès.');
    }

    public function edit(AutreDocument $autres_document)
    {
        // Using the parameter name from the route resource 'autres-documents'
        $autreDocument = $autres_document;
        return view('admin.autres-documents.edit', compact('autreDocument'));
    }

    public function update(AutreDocumentUpdateRequest $request, AutreDocument $autres_document)
    {
        $data = $request->validated();

        if ($request->hasFile('pathfile')) {
            $file = $request->file('pathfile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/autres_documents'), $filename);
            $data['pathfile'] = 'autres_documents/' . $filename;
        }

        $autres_document->update($data);

        return redirect()->route('admin.autres-documents.index')
            ->with('success', 'Document mis à jour avec succès.');
    }

    public function destroy(AutreDocument $autres_document)
    {
        $autres_document->delete();

        return redirect()->route('admin.autres-documents.index')
            ->with('success', 'Document supprimé avec succès.');
    }
}
