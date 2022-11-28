<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donnee extends Model
{
    use HasFactory;

    /**
     * The users that belong to the donnee.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->as('donnee_user')
                    ->withTimestamps();
    }
}
