<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipeDirectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom_prenom' => $this->nom_prenom,
            'photo' => $this->photo,
            'description' => $this->description,
            'email' => $this->email,
        ];
    }
}
