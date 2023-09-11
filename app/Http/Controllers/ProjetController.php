<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetRequest;
use App\Models\Projet;
use Illuminate\Http\Request;
use App\Models\Plateforme;
use App\Models\Versement;

use function Termwind\render;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::all();
        return view('projets.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plateformes = Plateforme::all();
        $versements = Versement::all();
        return view('projets.create', compact('plateformes', 'versements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'plateforme_id' => 'required|exists:plateformes,id',
            'montantInvesti' => 'required|numeric',
            'frais' => 'required|numeric',
            // 'fiscalite' => 'required|boolean',
            'tauxBrut' => 'required|numeric',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'versement_id' => 'required|exists:versements,id',
        ]);

        $validatedData['status_id'] = $validatedData['status_id'] ?? 1;
        $validatedData['tauxNet'] = $validatedData['tauxNet'] ?? 5;
        $validatedData['duree'] = $validatedData['duree'] ?? 30;
        $validatedData['gainMensu'] = $validatedData['gainMensu'] ?? 12;
        $validatedData['gainFinal'] = $validatedData['gainFinal'] ?? 500;
        $validatedData['fiscalite'] = $validatedData['fiscalite'] ?? true;


        $projet = Projet::create($validatedData);
        $projet->save();
        return redirect()->route('projets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet)
    {
        return view('projets.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    {
        $validatedData = $this->validator($request->all())->validate();
        $projet->update($validatedData);
        $projet->plateforme()->associate($request->input('plateforme_id'));
        $projet->versement()->associate($request->input('versement_id'));
        $projet->save();
        return redirect()->route('projets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
