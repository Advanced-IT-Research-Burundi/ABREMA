<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitStoreRequest;
use App\Http\Requests\ProduitUpdateRequest;
use App\Models\Produit;
use App\Imports\ProduitsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::active()->paginate(10);
        
        return view('admin.produits.index', compact('produits'));
    }

    public function create()
    {
        return view('admin.produits.create');
    }

    public function store(ProduitStoreRequest $request)
    {
        Produit::create($request->validated());

        return redirect()
            ->route('admin.produits.index')
            ->with('success', 'Produit ajouté avec succès');
    }

    public function show(Produit $produit)
    {
        return view('admin.produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        return view('admin.produits.edit', compact('produit'));
    }

    public function update(ProduitUpdateRequest $request, Produit $produit)
    {
        $produit->update($request->validated());

        return redirect()
            ->route('admin.produits.index')
            ->with('success', 'Produit modifié avec succès');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()
            ->route('admin.produits.index')
            ->with('success', 'Produit supprimé avec succès');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new ProduitsImport, $request->file('file'));
            return back()->with('success', 'Importation réussie !');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        $headers = [
            'designation_commerciale', 'dci', 'dosage', 'forme', 
            'conditionnement', 'category', 'nom_laboratoire', 
            'pays_origine', 'titulaire_amm', 'pays_titulaire_amm', 
            'num_enregistrement', 'date_enrg', 'date_expiration', 'statut'
        ];

        return new StreamedResponse(function() use ($headers) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $headers);
            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="modele_import_produits.csv"',
        ]);
    }
}
