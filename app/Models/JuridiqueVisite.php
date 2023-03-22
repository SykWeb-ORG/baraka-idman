<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuridiqueVisite extends Model
{
    use HasFactory;

    protected $fillable = [
        'visite_remarque',
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d';
    
    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'beneficiaire',
    ];

    /**
     * Get the beneficiaire that owns the medicale visite.
     */
    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class);
    }

    /**
     * Get the juridique assistant that owns the juridique visite.
     */
    public function juridique_assistant()
    {
        return $this->belongsTo(JuridiqueAssistant::class);
    }
}
