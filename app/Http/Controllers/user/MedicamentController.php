<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProduitsExport;
use Barryvdh\DomPDF\Facade\Pdf;

class MedicamentController extends Controller
{
    public function notification()
    {
        return view('medicament.notifications');
    }
    public function textemedicament()
    {
        return view('medicament.texte');
    }
    public function produit()
    {
        $produits = Produit::paginate(15);

        return view('medicament.produits', compact('produits'));
    }

        public function exportExcel()
    {
        return Excel::download(new ProduitsExport, 'produits_enregistres.xlsx');
    }

    //     public function exportPDF()
    // {
    //     $produits = Produit::all();
    //     $pdf = Pdf::loadView('web.produits.pdf', compact('produits'));

    //     return $pdf->download('produits_enregistres.pdf');
    // }
}
