<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'partenaire_nom',
        'partenaire_objectif',
        'partenaire_logo',
    ];

    /**
     * Get the programmes for the partanaire.
     */
    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }
}
