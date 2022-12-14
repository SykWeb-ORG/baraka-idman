<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lieu',
        'programme_date',
        'programme_resultat',
    ];

    /**
     * Get the programme that owns the place.
     */
    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
}
