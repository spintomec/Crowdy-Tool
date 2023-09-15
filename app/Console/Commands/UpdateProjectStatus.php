<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Projet;
use App\Models\Remboursement;
use App\Models\Status;
use Illuminate\Support\Facades\Log;

class UpdateProjectStatus extends Command
{
    protected $signature = 'projects:update-status';
    protected $description = 'Update project status to "Retard" if the end date is in the past.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Récupérer tous les projets dont la date de fin est passée
        $projets = Projet::where('dateFin', '<', Carbon::now())->get();

        foreach ($projets as $projet) {
            $remboursement_somme = Remboursement::where('projet_id', $projet->id)->sum('montant');
            $projet_montant_investi = $projet->montantInvesti;
            $remboursement_restant = $projet_montant_investi - $remboursement_somme;

            $status_nom = Status::where('nom', 'Retard')->first();
            $status_id = $status_nom->id;
            if ($remboursement_restant > 0){
                $projet->status_id = $status_id;
                $projet->save();
                Log::info("Projet {$projet->id} mis en retard.");
            }
        }

        $this->info('Project statuses updated successfully.');
    }
}
