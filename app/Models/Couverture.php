<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couverture extends Model
{
    use HasFactory;

    /**
     * The beneficiaires that belong to the couverture.
     */
    public function beneficiaires()
    {
        return $this->belongsToMany(Beneficiaire::class)
                    ->as('beneficiaire_couverture')
                    ->withTimestamps();
    }
}
