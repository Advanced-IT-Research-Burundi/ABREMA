<?php

namespace App\Http\Controllers;

use App\Models\FormulaireInspection;
use Illuminate\Http\Request;

class FormulaireInspectionController extends Controller
{
    
    public function index()
    {
        $inspections = FormulaireInspection::latest()->get();
        $latestInspection = $inspections->first();

        return view('admin.formulaireinspection.index', compact('inspections', 'latestInspection'));
    }


    public function create()
    {
        return view('admin.formulaireinspection.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $title = $request->input('title');

        // Vérifier si un fichier existe déjà
        $existingInspection = FormulaireInspection::latest()->first();

        if ($existingInspection) {
            // Supprimer l'ancien fichier du dossier public
            $oldFilePath = public_path('doc/' . $existingInspection->file_path);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Utiliser le titre comme nom de fichier
            $filename = $title . '.' . $file->getClientOriginalExtension();
            $path = $filename; // Le chemin relatif depuis public/

            // Stocker dans le dossier public
            $file->move(public_path('doc'), $filename);

            // Mettre à jour l'existant
            $existingInspection->update([
                'title' => $title,
                'file_path' => $path,
            ]);
        } else {
            // Créer un nouveau
            $filename = $title . '.' . $file->getClientOriginalExtension();
            $path = $filename; // Le chemin relatif depuis public/

            // Stocker dans le dossier public
            $file->move(public_path('doc'), $filename);

            FormulaireInspection::create([
                'title' => $title,
                'file_path' => $path,
            ]);
        }

        return redirect()->route('admin.formulaire-inspection.index')->with('success', 'Formulaire d\'inspection ' . ($existingInspection ? 'remplacé' : 'téléversé') . ' avec succès.');
    }

    public function destroy($id)
    {
        $inspection = FormulaireInspection::findOrFail($id);

        // Supprimer le fichier du dossier public
        $filePath = public_path('doc/' . $inspection->file_path);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $inspection->delete();

        return redirect()->route('admin.formulaire-inspection.index')->with('success', 'Formulaire d\'inspection supprimé avec succès.');
    }

    // edit et update
    public function edit($id)
    {
        $inspection = FormulaireInspection::findOrFail($id);
        return view('admin.formulaireinspection.edit', compact('inspection'));
    }

    public function update(Request $request, $id)
    {
        $inspection = FormulaireInspection::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // Supprimer l'ancien fichier du dossier public
            $oldFilePath = public_path('doc/' . $inspection->file_path);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            $file = $request->file('file');
            $title = $request->input('title') ?: $inspection->title;

            // Utiliser le titre comme nom de fichier
            $filename = $title . '.' . $file->getClientOriginalExtension();
            $path = $filename; // Le chemin relatif depuis public/

            // Stocker dans le dossier public
            $file->move(public_path('doc'), $filename);

            $inspection->file_path = $path;
        }

        $inspection->title = $request->input('title') ?: $inspection->title;
        $inspection->save();

        return redirect()->route('admin.formulaire-inspection.index')->with('success', 'Formulaire d\'inspection mis à jour avec succès.');
    }
}