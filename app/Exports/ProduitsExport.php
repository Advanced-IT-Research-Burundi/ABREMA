<?php

namespace App\Exports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProduitsExport implements FromCollection, WithHeadings
{
    // Récupère tous les produits
    public function collection()
    {
        return Produit::select(
            'id','designation_commerciale','dci','dosage','forme','conditionnement',
            'category','nom_laboratoire','pays_origine','titulaire_amm',
            'pays_titulaire_amm','num_enregistrement','date_amm'
        )->get();
    }

    // Titres des colonnes
    public function headings(): array
    {
        return [
            'ID','DESIGNATION','DCI','DOSAGE','FORME','CONDITIONNEMENT','CATEGORY',
            'LABO','PAYS ORIGINE','TITULAIRE AMM','PAYS TITULAIRE',
            'N° ENREGISTREMENT','DATE ENREGISTREMENT'
        ];
    }
}
