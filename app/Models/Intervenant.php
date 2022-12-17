<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervenant extends Model
{
    use HasFactory;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'zones',
        'programmes',
    ];

    /**
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the beneficiaires for the intervenant.
     */
    public function beneficiaires()
    {
        return $this->hasMany(Beneficiaire::class);
    }

    /**
     * The zones that belong to the intervenant.
     */
    public function zones()
    {
        return $this->belongsToMany(Zone::class)
                    ->as('intervenant_zone')
                    ->withTimestamps();
    }

    /**
     * The programmes that belong to the intervenant.
     */
    public function programmes()
    {
        return $this->belongsToMany(Programme::class)
                    ->as('intervenant_programme')
                    ->withTimestamps();
    }
}
