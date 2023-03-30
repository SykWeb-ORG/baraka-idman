<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammeType extends Model
{
    use HasFactory;

    /**
     * Get the programmes for the programme type.
     */
    public function programmes()
    {
        return $this->hasMany(Programme::class, 'programme_type');
    }
}
