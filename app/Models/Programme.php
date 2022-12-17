<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'programme_type',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'places',
    ];

    /**
     * Get the places for the programme.
     */
    public function places()
    {
        return $this->hasMany(Place::class);
    }

    /**
     * The intervenants that belong to the programme.
     */
    public function intervenants()
    {
        return $this->belongsToMany(Intervenant::class)
                    ->as('intervenant_programme')
                    ->withTimestamps();
    }
}
