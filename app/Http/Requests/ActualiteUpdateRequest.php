<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualiteUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Le titre est obligatoire',
            'title.max' => 'Le titre ne peut pas dépasser 255 caractères',
            'image.image' => 'Le fichier doit être une image',
            'image.mimes' => 'L\'image doit être au format: jpeg, png, jpg ou gif',
            'image.max' => 'L\'image ne peut pas dépasser 2MB',
        ];
    }
}