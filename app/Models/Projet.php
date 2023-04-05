<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'projet_num_concention',
        'projet_titre',
        'projet_description',
        'projet_objectif_homme',
        'projet_objectif_femme',
        'projet_objectif_15',
        'projet_objectif_15_18',
        'projet_objectif_18',
        'partenaire_id',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'partenaire',
    ];

    /**
     * The partenaire that participates in the projet.
     */
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
}
