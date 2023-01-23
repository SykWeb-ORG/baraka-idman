<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'permissions',
    ];
    
    /**
     * The permissions that belong to the role.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')
                    ->as('role_permission')
                    ->withTimestamps();
    }

    /**
     * Get the services for the role.
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
