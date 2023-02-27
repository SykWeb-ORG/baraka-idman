<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
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
        'participants',
    ];

    /**
     * Get the participants for the formation.
     */
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
