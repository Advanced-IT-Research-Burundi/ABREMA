<?php

namespace App\Imports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProduitsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new Produit([
            'designation_commerciale' => $row['designation_commerciale'],
            'dci'                     => $row['dci'],
            'dosage'                  => $row['dosage'],
            'forme'                   => $row['forme'],
            'conditionnement'         => $row['conditionnement'],
            'category'                => $row['category'],
            'nom_laboratoire'         => $row['nom_laboratoire'],
            'pays_origine'            => $row['pays_origine'],
            'titulaire_amm'           => $row['titulaire_amm'],
            'pays_titulaire_amm'      => $row['pays_titulaire_amm'],
            'num_enregistrement'      => $row['num_enregistrement'],
            'date_amm'                => $this->transformDate($row['date_enrg']),
            'date_expiration'         => $this->transformDate($row['date_expiration']),
            'statut_amm'              => $row['statut'] ?? 'active',
            'user_id'                 => auth()->id(),
        ]);
    }

    public function rules(): array
    {
        return [
            'designation_commerciale' => 'required',
            'dci'                     => 'required',
            'num_enregistrement'      => 'required',
            'date_enrg'               => 'required',
        ];
    }

    private function transformDate($value)
    {
        try {
            if(is_numeric($value)){
                return Carbon::instance(Date::excelToDateTimeObject($value));
            }
        } catch (\ErrorException $e) {
            return Carbon::parse($value);
        }finally{
            echo is_string($value) ? $value : 'not a string';
        }
    }
}

