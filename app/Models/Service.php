<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'users',
        'service_type',
    ];

    /**
     * The beneficiaires that belong to the service.
     */
    public function beneficiaires()
    {
        return $this->belongsToMany(Beneficiaire::class, 'beneficiaire_service_user')
                    ->as('beneficiaire_service_user')
                    ->withPivot(['user_id'])
                    ->withTimestamps();
    }

    /**
     * The users that belong to the service.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'beneficiaire_service_user')
                    ->as('beneficiaire_service_user')
                    ->withPivot(['beneficiaire_id'])
                    ->withTimestamps();
    }

    /**
     * Get the role that owns the service.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * The service type that own the service.
     */
    public function service_type()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
