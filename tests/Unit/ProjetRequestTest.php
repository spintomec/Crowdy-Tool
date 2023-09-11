<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use App\Http\Requests\ProjetRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;

class ProjetRequestTest extends TestCase
{
    public function testValidationPasses()
    {
        // Les données de test valides
        $data = [
            'nom' => 'Nom du projet',
            'plateforme_id' => 1,
            'status_id' => 1,
            'montantInvesti' => 1000,
            'frais' => 50,
            'fiscalite' => false,
            'tauxBrut' => 5.5,
            'tauxNet' => 5.5,
            'duree' => 5,
            'dateDebut' => '2023-09-15',
            'dateFin' => '2024-09-15',
            'versement_id' => 1,
            'gainMensuel' => 1,
            'gainFinal' => 1,
        ];

        $rules = [
            'nom' => 'required|string|max:255',
            'plateforme_id' => 'required|exists:plateformes,id',
            'status_id' => 'required|exists:status,id',
            'montantInvesti' => 'required|numeric',
            'frais' => 'required|numeric',
            'fiscalite' => 'required|boolean',
            'tauxBrut' => 'required|numeric',
            'tauxNet' => 'required|numeric',
            'duree' => 'required|integer',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'versement_id' => 'required|exists:versements,id',
            'gainMensuel' => 'required|numeric',
            'gainFinal' => 'required|numeric',
        ];

        $validator = Validator::make($data, $rules);
        $this->assertTrue($validator->passes());

    }

    public function testValidationFails()
    {
        $data = [
            'nom' => '',
        ];

        $validator = Validator::make($data, (new ProjetRequest)->rules());
        $this->assertFalse($validator->passes());
    }
}
