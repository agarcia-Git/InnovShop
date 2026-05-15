<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandeRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     * On retourne true car la protection est déjà gérée par le middleware 'auth'.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Les règles de validation qui s'appliquent à la requête.
     */
    public function rules(): array
    {
        return [
            'shipping_address'     => 'required|string|max:255',
            'shipping_city'        => 'required|string|max:100',
            'shipping_postal_code' => 'required|string|max:10',
            'shipping_country'     => 'required|string|max:100',
        ];
    }

    /**
     * Les messages d'erreur personnalisés en français.
     */
    public function messages(): array
    {
        return [
            'shipping_address.required'     => 'L\'adresse est obligatoire.',
            'shipping_city.required'        => 'La ville est obligatoire.',
            'shipping_postal_code.required' => 'Le code postal est obligatoire.',
            'shipping_country.required'     => 'Le pays est obligatoire.',
            'shipping_postal_code.max'      => 'Le code postal ne peut pas dépasser 10 caractères.',
        ];
    }
}