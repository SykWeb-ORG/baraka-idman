<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'participant_nom',
        'participant_prenom',
        'participant_cin',
        'participant_tele',
    ];

    /**
     * Get the formation that contains the participant.
     */
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
