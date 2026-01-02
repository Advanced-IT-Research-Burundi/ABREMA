<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProduitsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AvisPublic;
use App\Models\TexteReglementaire;

class MedicamentController extends Controller
{
    public function notification()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('medicament.notifications', compact('avisPublics'));
    }
    public function textemedicament()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        $textes = TexteReglementaire::where('category', TexteReglementaire::CAT_MEDICAMENT)->latest()->get();
        return view('medicament.texte', compact('avisPublics', 'textes'));
    }
    public function produit(Request $request)
    {
        $search = $request->input('search');
        $produits = Produit::active()
            ->when($search, function($query) use ($search) {
                return 
                $query->where('designation_commerciale', 'like', '%' . $search . '%')
                    ->orWhere(column: 'dci', 'like', '%' . $search . '%');
            })
            ->paginate(15)
            ->withQueryString();

        return view('medicament.produits', compact('produits'));
    }

    public function listemedicament()
    {
        $avisPublics = AvisPublic::latest()->take(5)->get();
        return view('medicament.listemedicament', compact('avisPublics'));
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
