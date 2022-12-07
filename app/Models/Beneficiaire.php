<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'adresse',
        'sexe',
        'cin',
        'telephone',
        'type_travail',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'couvertures',
        'drogue_types',
    ];

    /**
     * Get the suicide causes for the beneficiaire.
     */
    public function suicide_causes()
    {
        return $this->hasMany(SuicideCause::class);
    }

    /**
     * The couvertures that belong to the beneficiaire.
     */
    public function couvertures()
    {
        return $this->belongsToMany(Couverture::class)
                    ->as('beneficiaire_couverture')
                    ->withTimestamps();
    }

    /**
     * The groupes that belong to the beneficiaire.
     */
    public function groupes()
    {
        return $this->belongsToMany(Groupe::class)
                    ->as('beneficiaire_groupe')
                    ->withTimestamps();
    }

    /**
     * The services that belong to the beneficiaire.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class)
                    ->as('beneficiaire_service')
                    ->withTimestamps();
    }

    /**
     * The violences that belong to the beneficiaire.
     */
    public function violence_types()
    {
        return $this->belongsToMany(ViolenceType::class)
                    ->as('beneficiaire_violence_type')
                    ->withTimestamps();
    }

    /**
     * The drogues that belong to the beneficiaire.
     */
    public function drogue_types()
    {
        return $this->belongsToMany(DrogueType::class)
                    ->withPivot('frequence')
                    ->as('beneficiaire_drogue_type')
                    ->withTimestamps();
    }

    /**
     * Get the intervenant that register thie beneficiaire.
     */
    public function intervenant()
    {
        return $this->belongsTo(Intervenant::class);
    }
}
