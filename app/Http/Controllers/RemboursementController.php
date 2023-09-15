<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Models\Remboursement;
use App\Models\Status;
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

    public function create($projet_id)
    {
        $remboursement_somme = Remboursement::where('projet_id', $projet_id)->sum('montant');
        $projet_data = Projet::find($projet_id);
        if ($projet_data) {
            $projet_montant_investi = $projet_data->montantInvesti;
            $remboursement_restant = $projet_montant_investi - $remboursement_somme;
        } else {
            $remboursement_restant = null;
        }
        $projets = Projet::all();
        return view('remboursements.create', compact('projets', 'projet_id', 'remboursement_restant'));
    }

    public function store(Request $request, $projet_id)
    {
        $validatedData = $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'montant' => 'required|numeric',
            'dateRemboursement' => 'required|date',
        ]);
        $remboursement_somme = Remboursement::where('projet_id', $projet_id)->sum('montant');

        $projet = Projet::find($projet_id);
        $projet_montant_investi = $projet->montantInvesti;
        $remboursement_restant = $projet_montant_investi - $remboursement_somme;
        $status_nom = Status::where('nom', 'Remboursé')->first();
        $status_id = $status_nom->id;
        if ($remboursement_restant == $validatedData['montant']){
            $projet->status_id = $status_id;
            $projet->save();
        }
        Remboursement::create($validatedData);
        return redirect()->route('remboursements.index');
    }

    // public function edit(Remboursement $remboursement)
    // {
    //     $remboursement_somme = Remboursement::where('projet_id', $projet_id)->sum('montant');
    //     $projet_data = Projet::find($projet_id);
    //     if ($projet_data) {
    //         $projet_montant_investi = $projet_data->montantInvesti;
    //         $remboursement_restant = $projet_montant_investi - $remboursement_somme;
    //     } else {
    //         $remboursement_restant = null;
    //     }
    //     return view('remboursements.edit', compact('projets', 'remboursement'));
    // }

    // public function update(Request $request, Remboursement $remboursement)
    // {
    //     $validatedData = $request->validate([
    //         'projet_id' => 'required|exists:projets,id',
    //         'montant' => 'required|numeric',
    //         'dateRemboursement' => 'required|date',
    //     ]);
    //     $remboursement->update($validatedData);
    //     return redirect()->route('remboursements.index');
    // }

    public function destroy(Remboursement $remboursement)
    {
        $remboursement->delete();
        return redirect()->route('remboursements.index')->with('success', 'Remboursement supprimé avec succès');
    }
}
