<?php

namespace App\Http\Controllers;

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
        $validatedData = $this->validator($request->all())->validate();
        $projet = Projet::create($validatedData);
        $projet->plateforme()->associate($request->input('plateforme_id'));
        $projet->versement()->associate($request->input('versement_id'));
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
