<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'designation_commerciale' => ['required', 'string'],
            'dci' => ['required', 'string'],
            'dosage' => ['required', 'string'],
            'forme' => ['required', 'string'],
            'conditionnement' => ['required', 'string'],
            'category' => ['required', 'string'],
            'nom_laboratoire' => ['required', 'string'],
            'pays_origine' => ['required', 'string'],
            'titulaire_amm' => ['required', 'string'],
            'pays_titulaire_amm' => ['required', 'string'],
            'num_enregistrement' => ['required', 'integer'],
            'date_amm' => ['nullable', 'date'],
            'date_expiration' => ['nullable', 'date'],
            'statut_amm' => ['nullable', 'string'],
            'user_id' => ['nullable', 'exists:users,id'],
        ];
    }
}
