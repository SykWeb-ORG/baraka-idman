<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cas extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cas';

    /**
     * The beneficiaires that belong to the cas juridique.
     */
    public function beneficiaires()
    {
        return $this->belongsToMany(Beneficiaire::class, "beneficiaire_cas", "cas_id", "beneficiaire_id")
                    ->as('beneficiaire_cas')
                    ->withTimestamps();
    }
}
