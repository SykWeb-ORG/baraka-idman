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
     * Get the beneficiare that owns the sociale visite.
     */
    public function beneficiare()
    {
        return $this->belongsTo(Beneficiaire::class);
    }
}
