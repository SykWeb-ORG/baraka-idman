<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrogueType extends Model
{
    use HasFactory;

    /**
     * The beneficiaires that belong to the drogue.
     */
    public function beneficiaires()
    {
        return $this->belongsToMany(Beneficiaire::class)
                    ->withPivot('frequence')
                    ->as('beneficiaire_drogue_type')
                    ->withTimestamps();
    }
}
