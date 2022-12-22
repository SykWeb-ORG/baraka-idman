<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAssistant extends Model
{
    use HasFactory;

    /**
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the sociale visites for the beneficiaire.
     */
    public function medicale_visites()
    {
        return $this->hasMany(MedicaleVisite::class);
    }
}
