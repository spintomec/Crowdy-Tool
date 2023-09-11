<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'plateforme_id' => 'required|exists:plateformes,id',
            'montantInvesti' => 'required|numeric',
            'frais' => 'required|numeric',
            'fiscalite' => 'required|boolean',
            'tauxBrut' => 'required|numeric',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'versement_id' => 'required|exists:versements,id',
        ];
    }
}
