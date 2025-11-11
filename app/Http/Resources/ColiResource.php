<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ColiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom_prenom' => $this->nom_prenom,
            'phone' => $this->phone,
            'email' => $this->email,
            'pathfile' => $this->pathfile,
            'message' => $this->message,
        ];
    }
}
