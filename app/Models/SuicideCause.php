<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuicideCause extends Model
{
    use HasFactory;

    /**
     * Get the beneficiare that owns the suicide cause.
     */
    public function beneficiare()
    {
        return $this->belongsTo(Beneficiaire::class);
    }
}
