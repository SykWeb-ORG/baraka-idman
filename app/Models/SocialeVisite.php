<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialeVisite extends Model
{
    use HasFactory;

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
     * Get the beneficiaire that owns the sociale visite.
     */
    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class);
    }

    /**
     * Get the social assistant that owns the sociale visite.
     */
    public function social_assistant()
    {
        return $this->belongsTo(SocialAssistant::class);
    }
}
