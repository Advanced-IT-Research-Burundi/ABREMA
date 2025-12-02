<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartenaireStoreRequest extends FormRequest
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
            'nom' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,gif', 'max:2048'],
            'description' => ['nullable', 'string'],
            'user_id' => ['nullable', 'exists:users,id'],
        ];
    }
}
