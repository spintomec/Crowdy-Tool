<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Models\Plateforme;
use App\Models\Status;
use App\Models\Versement;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = DB::table('projets')
            ->join('versements', 'projets.versement_id', '=', 'versements.id')
            ->join('plateformes', 'projets.plateforme_id', '=', 'plateformes.id')
            ->join('status', 'projets.status_id', '=', 'status.id')
            ->leftJoin('remboursements', 'projets.id', '=', 'remboursements.projet_id') // Ajout de la jointure pour les remboursements
            ->select('projets.*', 'versements.nom as nom_versement', 'plateformes.nom as nom_plateforme', 'status.nom as nom_status', DB::raw('SUM(remboursements.montant) as total_montant'))
            ->groupBy('projets.id', 'versements.nom', 'plateformes.nom', 'status.nom', 'projets.dateDebut', 'projets.dateFin', 'projets.nom', 'projets.created_at', 'projets.updated_at')
            ->orderBy('nom_plateforme')
            ->orderBy('dateDebut')
            ->get();

        return view('projets.index', compact('projets'));
    }

    public function create()
    {
        $plateformes = Plateforme::all();
        $versements = Versement::all();
        $statusOption = Status::all();

        return view('projets.create', compact('plateformes', 'versements', 'statusOption'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'plateforme_id' => 'required|exists:plateformes,id',
            'status_id' => 'required|exists:status,id',
            'montantInvesti' => 'required|numeric',
            'frais' => 'required|numeric',
            'fiscalite' => 'required|boolean',
            'tauxBrut' => 'required|numeric',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'versement_id' => 'required|exists:versements,id',
        ]);

        // Calcul de la durée
        $dateDebut = Carbon::parse($request->input('dateDebut'));
        $dateFin = Carbon::parse($request->input('dateFin'));
        $duree = $dateDebut->diff($dateFin);
        $validatedData['duree'] = $duree->m;

        // Calcul du tauxNet en fonction de la fiscalité
        if ($validatedData['fiscalite'] == 0) {
            $validatedData['tauxNet'] = $validatedData['tauxBrut'] * 0.7;
        } else {
            $validatedData['tauxNet'] = $validatedData['tauxBrut'] * 0.828;
        }
        // Calcul du gain final
        $validatedData['gainFinal'] = ($validatedData['montantInvesti'] * (($validatedData['tauxNet']-$validatedData['frais'])/100))/12 * $duree->m;
        Projet::create($validatedData);

        return redirect()->route('projets.index');
    }

    public function show(Projet $projet)
    {
    }

    public function edit(Projet $projet)
    {
        $plateformes = Plateforme::all();
        $versements = Versement::all();
        $statusOption = Status::all();
        return view('projets.edit', compact('projet', 'plateformes', 'versements', 'statusOption'));
    }

    public function update(Request $request, Projet $projet)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'plateforme_id' => 'required|exists:plateformes,id',
            'status_id' => 'required|exists:status,id',
            'montantInvesti' => 'required|numeric',
            'frais' => 'required|numeric',
            'fiscalite' => 'required|boolean',
            'tauxBrut' => 'required|numeric',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'versement_id' => 'required|exists:versements,id',
        ]);

        // Calcul de la durée
        $dateDebut = Carbon::parse($request->input('dateDebut'));
        $dateFin = Carbon::parse($request->input('dateFin'));
        $duree = $dateDebut->diff($dateFin);
        $validatedData['duree'] = $duree->m;

        // Calcul du tauxNet en fonction de la fiscalité
        if ($validatedData['fiscalite'] == 0) {
            $validatedData['tauxNet'] = $validatedData['tauxBrut'] * 0.7;
        } else {
            $validatedData['tauxNet'] = $validatedData['tauxBrut'] * 0.828;
        }

        // Calculez le gain final
        $validatedData['gainFinal'] = ($validatedData['montantInvesti'] * (($validatedData['tauxNet']-$validatedData['frais'])/100))/12 * $duree->m;
        $projet->update($validatedData);

        return redirect()->route('projets.index');
    }

    public function destroy(Projet $projet)
    {
        $projet->delete();
        return redirect()->route('projets.index')->with('success', 'Projet supprimé avec succès');
    }
}
