<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Projet extends Model
{
    use HasFactory;

    public function pateforme(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
    public function versement(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
}
