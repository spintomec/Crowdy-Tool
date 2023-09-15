<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Models\Remboursement;
use Illuminate\Support\Facades\DB;

class RemboursementController extends Controller
{
    public function index()
    {
        $remboursements = DB::table('remboursements')
        ->join('projets', 'remboursements.projet_id', '=', 'projets.id')
        ->select('remboursements.*', 'projets.nom as nom_projet')
        ->orderBy('montant')
        ->orderBy('dateRemboursement')
        ->get();


        return view('remboursements.index', compact('remboursements'));
    }

    public function create()
    {
        $projets = Projet::all();
        return view('remboursements.create', compact('projets'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'montant' => 'required|numeric',
            'dateRemboursement' => 'required|date',
        ]);
        Remboursement::create($validatedData);
        return redirect()->route('remboursements.index');
    }

    public function edit(Remboursement $remboursement)
    {
        $projets = Projet::all();
        return view('remboursements.edit', compact('projets', 'remboursement'));
    }

    public function update(Request $request, Remboursement $remboursement)
    {
        $validatedData = $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'montant' => 'required|numeric',
            'dateRemboursement' => 'required|date',
        ]);
        $remboursement->update($validatedData);
        return redirect()->route('remboursements.index');
    }

    public function destroy(Remboursement $remboursement)
    {
        $remboursement->delete();
        return redirect()->route('remboursements.index')->with('success', 'Remboursement supprimé avec succès');
    }
}
