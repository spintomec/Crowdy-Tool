<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Projet;


class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    public function projets(): HasMany
    {
        return $this->hasMany(Projet::class);
    }
}
