<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'designation_commerciale' => $this->designation_commerciale,
            'dci' => $this->dci,
            'dosage' => $this->dosage,
            'forme' => $this->forme,
            'conditionnement' => $this->conditionnement,
            'category' => $this->category,
            'nom_laboratoire' => $this->nom_laboratoire,
            'pays_origine' => $this->pays_origine,
            'titulaire_amm' => $this->titulaire_amm,
            'pays_titulaire_amm' => $this->pays_titulaire_amm,
            'num_enregistrement' => $this->num_enregistrement,
            'date_amm' => $this->date_amm,
            'statut_amm' => $this->statut_amm,
        ];
    }
}
