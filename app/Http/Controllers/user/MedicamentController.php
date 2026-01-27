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
        $search = trim($request->input('search'));

        $produits = Produit::active()
            ->when($search, function ($query) use ($search) {

                $words = preg_split('/\s+/', $search);

                $query->where(function ($q) use ($words) {
                    foreach ($words as $word) {
                        $q->where(function ($sub) use ($word) {
                            $sub->where('designation_commerciale', 'LIKE', "%{$word}%")
                                ->orWhere('dci', 'LIKE', "%{$word}%")
                                ->orWhere('dosage', 'LIKE', "%{$word}%")
                                ->orWhere('forme', 'LIKE', "%{$word}%")
                                ->orWhere('conditionnement', 'LIKE', "%{$word}%")
                                ->orWhere('category', 'LIKE', "%{$word}%")
                                ->orWhere('nom_laboratoire', 'LIKE', "%{$word}%")
                                ->orWhere('pays_origine', 'LIKE', "%{$word}%")
                                ->orWhere('titulaire_amm', 'LIKE', "%{$word}%")
                                ->orWhere('pays_titulaire_amm', 'LIKE', "%{$word}%")
                                ->orWhere('num_enregistrement', 'LIKE', "%{$word}%")
                                ->orWhereDate('date_amm', $word)
                                ->orWhereDate('date_expiration', $word)
                                ->orWhere('statut_amm', 'LIKE', "%{$word}%");
                        });
                    }
                });
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
