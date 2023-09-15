<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Versement;
use App\Models\Status;
use App\Models\Plateforme;
use App\Models\Remboursement;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'plateforme_id', 'montantInvesti', 'frais', 'fiscalite', 'tauxBrut', 'tauxNet', 'duree', 'dateDebut', 'dateFin', 'versement_id', 'status_id', 'gainFinal', 'gainPonctuel'];


    public function versement(): BelongsTo
    {
        return $this->belongsTo(Versement::class);
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function pateforme(): BelongsTo
    {
        return $this->belongsTo(Plateforme::class);
    }
    public function remboursements(): BelongsToMany
    {
        return $this->BelongsToMany(Remboursement::class);
    }
}
