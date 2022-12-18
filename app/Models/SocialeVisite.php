<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialeVisite extends Model
{
    use HasFactory;

    /**
     * Get the beneficiare that owns the sociale visite.
     */
    public function beneficiare()
    {
        return $this->belongsTo(Beneficiaire::class);
    }
}
