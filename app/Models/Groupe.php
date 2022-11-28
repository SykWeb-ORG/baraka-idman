<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    /**
     * Get the atelier that owns the groupe.
     */
    public function atelier()
    {
        return $this->belongsTo(Atelier::class);
    }

    /**
     * Get the seances for the groupe.
     */
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    /**
     * The beneficiaires that belong to the groupe.
     */
    public function beneficiaires()
    {
        return $this->belongsToMany(Beneficiaire::class)
                    ->as('beneficiaire_groupe')
                    ->withTimestamps();
    }
}
