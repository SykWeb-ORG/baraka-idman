<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicaleVisite extends Model
{
    use HasFactory;

    protected $fillable = [
        'visite_date',
        'visite_presence',
        'visite_remarque',
    ];

    /**
     * Get the beneficiare that owns the medicale visite.
     */
    public function beneficiare()
    {
        return $this->belongsTo(Beneficiaire::class);
    }

    /**
     * Get the medical assistant that owns the medicale visite.
     */
    public function medical_assistant()
    {
        return $this->belongsTo(MedicalAssistant::class);
    }
}
