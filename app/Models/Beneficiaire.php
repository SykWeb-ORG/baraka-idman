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
        'violence_types',
        'suicide_causes',
        'groupes',
        'cas',
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
        return $this->belongsToMany(Service::class, 'beneficiaire_service_user')
                    ->as('beneficiaire_service_user')
                    ->withPivot(['user_id'])
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
     * Get the user that register the beneficiaire.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the sociale visites for the beneficiaire.
     */
    public function sociale_visites()
    {
        return $this->hasMany(SocialeVisite::class);
    }

    /**
     * Get the medicale visites for the beneficiaire.
     */
    public function medicale_visites()
    {
        return $this->hasMany(MedicaleVisite::class);
    }

    /**
     * Get the juridique visites for the beneficiaire.
     */
    public function juridique_visites()
    {
        return $this->hasMany(JuridiqueVisite::class);
    }

    /**
     * The cas juridiques that belong to the beneficiaire.
     */
    public function cas()
    {
        return $this->belongsToMany(Cas::class, "beneficiaire_cas", "beneficiaire_id", "cas_id")
                    ->as('beneficiaire_cas')
                    ->withTimestamps();
    }

    /**
     * The beneficiaires that belong to the service.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'beneficiaire_service_user')
                    ->as('beneficiaire_service_user')
                    ->withPivot(['service_id'])
                    ->withTimestamps();
    }
    
    public function validation_social()
    {
        return $this->belongsTo(User::class, 'validation_social_assistant', 'id');
    }
    
    public function validation_admin()
    {
        return $this->belongsTo(User::class, 'validation_directive', 'id');
    }
    
    public function validation_medical()
    {
        return $this->belongsTo(User::class, 'validation_medical_assistant', 'id');
    }
}
