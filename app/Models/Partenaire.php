<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'partenaire_nom',
        'partenaire_objectif',
        'partenaire_logo',
    ];

    /**
     * Get the programmes for the partenaire.
     */
    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }
    
    /**
     * Get the projets for the partenaire.
     */
    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
}
