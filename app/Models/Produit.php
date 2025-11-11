<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designation_commerciale',
        'dci',
        'dosage',
        'forme',
        'conditionnement',
        'category',
        'nom_laboratoire',
        'pays_origine',
        'titulaire_amm',
        'pays_titulaire_amm',
        'num_enregistrement',
        'date_amm',
        'statut_amm',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'date_amm' => 'date',
        ];
    }
}
