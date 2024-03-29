<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zone_nom',
    ];

    /**
     * The intervenants that belong to the zone.
     */
    public function intervenants()
    {
        return $this->belongsToMany(Intervenant::class)
                    ->as('intervenant_zone')
                    ->withTimestamps();
    }
    
    /**
     * Get the users for the zone.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the beneficiaires for the zone.
     */
    public function beneficiaires()
    {
        return $this->hasMany(Beneficiaire::class, 'zone_habitation');
    }
}
