<?php

namespace App\Http\Controllers;

use App\Models\FormulaireInspection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $filename = $this->buildTimestampedFilename($title, $file->getClientOriginalExtension());

        $file->move(public_path('doc'), $filename);

        FormulaireInspection::create([
            'title' => $title,
            'file_path' => $filename,
        ]);

        return redirect()
            ->route('admin.formulaire-inspection.index')
            ->with('success', "Formulaire d'inspection televerse avec succes.");
    }

    public function destroy($id)
    {
        $inspection = FormulaireInspection::findOrFail($id);

        $filePath = public_path($this->docRelativePath($inspection->file_path));
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $inspection->delete();

        return redirect()
            ->route('admin.formulaire-inspection.index')
            ->with('success', "Formulaire d'inspection supprime avec succes.");
    }

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
            $file = $request->file('file');
            $title = $request->input('title') ?: $inspection->title;
            $filename = $this->buildTimestampedFilename($title, $file->getClientOriginalExtension());

            $file->move(public_path('doc'), $filename);

            $inspection->file_path = $filename;
        }

        $inspection->title = $request->input('title') ?: $inspection->title;
        $inspection->save();

        return redirect()
            ->route('admin.formulaire-inspection.index')
            ->with('success', "Formulaire d'inspection mis a jour avec succes.");
    }

    private function buildTimestampedFilename(string $title, string $extension): string
    {
        $slug = Str::slug($title) ?: 'formulaire-inspection';

        return now()->format('Ymd_His') . '_' . $slug . '.' . strtolower($extension);
    }

    private function docRelativePath(string $filePath): string
    {
        return str_starts_with($filePath, 'doc/') ? $filePath : 'doc/' . $filePath;
    }
}
