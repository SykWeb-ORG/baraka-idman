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
        return $this->belongsToMany(Beneficiaire::class, 'beneficiaire_service_user')
                    ->as('beneficiaire_service_user')
                    ->withTimestamps();
    }

    /**
     * Get the role that owns the service.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
