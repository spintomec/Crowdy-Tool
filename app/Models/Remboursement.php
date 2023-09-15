<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Remboursement extends Model
{
    use HasFactory;

    protected $fillable = ['montant', 'projet_id', 'dateRemboursement'];

    protected $table = 'remboursements';

    public function projets(): BelongsToMany
    {
        return $this->BelongsToMany(Projet::class);
    }
}
