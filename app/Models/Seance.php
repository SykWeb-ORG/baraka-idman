<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    /**
     * Get the groupe that owns the seance.
     */
    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
}
