<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The beneficiaires that belong to the service.
     */
    public function beneficiaires()
    {
        return $this->belongsToMany(Beneficiaire::class)
                    ->as('beneficiaire_service')
                    ->withTimestamps();
    }
}
